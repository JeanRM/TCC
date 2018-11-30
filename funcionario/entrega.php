<?php

//
// Lib 
//

const CHRON_PATH  = '\path\to\data\\';

const CHRON_STOP  = 0x00;
const CHRON_PAUSE = 0x01;
const CHRON_PLAY  = 0x03;

class PersistentChronometer {
    // fields

    private $_id;
    private $_elapsed;
    private $_status;
    private $_statustime;

    // construtor privado

    private function __construct() {}

    // propriedades

    function __get($prop) {
        switch($prop) {
        case 'id':
            return $this->_id;
        case 'status':
            return $this->_status;
        case 'elapsed':
            $elapsed = $this->_elapsed;

            if ($this->_status == CHRON_PLAY)
                $elapsed += max(microtime(true) - $this->_statustime, 0);

            return $elapsed;
        }
    }

    // comandos

    public function play() {
        if($this->_status == CHRON_PLAY)
            return;

        $this->_statustime = microtime(true);
        $this->_status = CHRON_PLAY;
    }

    public function pause() {
        if($this->_status != CHRON_PLAY)
            return;

        $time = microtime(true);

        $this->_elapsed += max($time - $this->_statustime, 0);

        $this->_statustime = microtime(true);
        $this->_status = CHRON_PAUSE;
    }

    public function stop() {
        if($this->_status == CHRON_STOP)
            return;

        $this->_statustime = microtime(true);
        $this->_elapsed = 0;
        $this->_status = CHRON_STOP;
    }

    // persistência

    public static function create() {
        $chron = new PersistentChronometer();
        $chron->_statustime = microtime(true);
        $chron->_elapsed = 0;
        $chron->_status = CHRON_STOP;

        $i = 0;
        while (true) {
            $chron->_id = ((int)$chron->_statustime) . '$' . $i++;

            $fname = CHRON_PATH . $chron->_id . '.chron';
            if(file_exists($fname)) 
                continue;
            $f = fopen($fname, 'w');
            fwrite($f, $chron->serialize());
            fclose($f);
            break;
        } 

        return $chron;
    }

    public static function load($id) {
        $fname = CHRON_PATH . $id . '.chron';

        if(!file_exists($fname))
            return false;
        $f = fopen($fname, 'r');
        $chron = PersistentChronometer::unserialize(fread($f, 255));
        fclose($f);

        return $chron;
    }

    public function save() {
        $fname = CHRON_PATH . $this->_id . '.chron';
        $f = fopen($fname, 'w');
        ftruncate($f, 0);
        fwrite($f, $this->serialize());
        fclose($f);
    }

    public function delete() {
        $fname = CHRON_PATH . $this->_id . '.chron';
        unlink($fname);
    }

    public function serialize() {
        return json_encode(array(
            'id' => $this->_id,
            'elapsed' => $this->_elapsed,
            'status' => $this->_status,
            'statustime' => $this->_statustime
        ));
    }

    public static function unserialize($string) {
        $data = json_decode($string);

        $chron = new PersistentChronometer();
        $chron->_id = $data->id;
        $chron->_elapsed = $data->elapsed;
        $chron->_status = $data->status;
        $chron->_statustime = $data->statustime;

        return $chron;
    }
}

//
// Comandos
//

if(isset($_GET['action'])) {
    switch($_GET['action']) {
    case 'play':
        if(isset($_GET['id'])
          && (($chron = PersistentChronometer::load($_GET['id'])) !== false)) {
            $chron->play();
            $chron->save();
        }
        break;
    case 'pause':
        if(isset($_GET['id'])
          && (($chron = PersistentChronometer::load($_GET['id'])) !== false)) {
            $chron->pause();
            $chron->save();
        }
        break;
    case 'stop':
        if(isset($_GET['id'])
          && (($chron = PersistentChronometer::load($_GET['id'])) !== false)) {
            $chron->stop();
            $chron->save();
        }
        break;
    case 'new':
        PersistentChronometer::create();
        break;
    case 'delete':
        if(isset($_GET['id'])
          && (($chron = PersistentChronometer::load($_GET['id'])) !== false)) {
            $chron->delete();
        }
        break;
    case 'get':
        if(isset($_GET['id'])
          && (($chron = PersistentChronometer::load($_GET['id'])) !== false)) {

            $data = new stdClass();
            $data->id = $chron->id;
            $data->elapsed = $chron->elapsed;
            $data->status = $chron->status;
            $data->result = true;

            echo json_encode($data);
        } else {
            echo '{"result": false}';
        }

        return;
    }
}

//
// Output
//

?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
        $(function(){
            var cEl = $('#chron');
            if(!window.localStorage)
                cEl.text('Para esta solução é necessário o uso de localStorage. Mas também podem ser utilizados cookies ou variaveis de sessão!!!');
            else {
                var id = localStorage.getItem("chron-id");

                if(!id)
                    cEl.text('Nenhum cronômetro definido!');
                else {
                    loadChronometer(id);
                    cEl.text('Aguarde...');
                }
            }
        });

        function setChronometer(id) {
            localStorage.setItem("chron-id", id);
            loadChronometer(id);
        }

        function loadChronometer(id) {
            var status = {
                <?php echo CHRON_STOP ?>: 'Parado',
                <?php echo CHRON_PLAY ?>: 'Executando',
                <?php echo CHRON_PAUSE ?>: 'Interrompido'
            };
            var cEl = $('#chron');
            $.getJSON('?action=get&id=' + id, null, function(data) {
                if(data.result)
                    cEl.text(
                        'ID: ' + data.id + "\n" +
                        'Estado: ' + status[data.status] + "\n" +
                        'Tempo (seg): ' + data.elapsed + "\n"
                    ).append(
                        '<a href="javascript:setChronometer(\'' + data.id + '\')">Atualizar</a> | ' +
                        (data.status == <?php echo CHRON_STOP ?> ? '' : '<a href="?action=stop&id=' + data.id + '">Parar</a> | ') +
                        (data.status == <?php echo CHRON_PLAY ?> ? '' : '<a href="?action=play&id=' + data.id + '">Executar</a> | ') +
                        (data.status != <?php echo CHRON_PLAY ?> ? '' : '<a href="?action=pause&id=' + data.id + '">Interromper</a> | ') +
                        '<a href="javascript:setChronometer(null)">Remover</a>' 
                    );
                else
                    cEl.text('Nenhum cronômetro definido!');
            });
        }
    </script>
</head>
<body>
<h1>Cronômetro padrão</h1>

<pre id="chron" style="white-space: pre"></pre>


<h1>Gerenciador</h1>
<table>
    <thead>
        <td>ID</td>
        <td>Estado</td>
        <td colspan="5">Comandos</td>
        <td>Tempo (seg)</td>
    </thead>
<?php

$files = scandir(CHRON_PATH);
$chrons = array();
foreach($files as $file) {
    if (substr($file, -6) == '.chron')
        $chrons[] = PersistentChronometer::load(substr($file, 0, -6));
}

$status = array(
    CHRON_STOP  => 'Parado',
    CHRON_PLAY  => 'Executando',
    CHRON_PAUSE => 'Interrompido'
);

foreach($chrons as $chron) {
    $td = array();
    $td[] = $chron->id;
    $td[] = $status[$chron->status];

    $td[] = $chron->status == CHRON_STOP ? '' : '<a href="?action=stop&id='. $chron->id .'">Parar</a>';
    $td[] = $chron->status == CHRON_PLAY ? '' : '<a href="?action=play&id='. $chron->id .'">Executar</a>';
    $td[] = $chron->status != CHRON_PLAY ? '' : '<a href="?action=pause&id='. $chron->id .'">Interromper</a>';
    $td[] = '<a href="?action=delete&id='. $chron->id .'">Destruir</a>';
    $td[] = '<a href="javascript:setChronometer(\''. $chron->id .'\')">Padrão</a>';
    $td[] = $chron->elapsed;
    echo '<tr id="cron-'. $chron->id .'"><td>'. implode('</td><td>', $td) .'</td></tr>';
}

?>
</table>
<a href="?action=new">Novo cronômetro</a>
</body>
</html>