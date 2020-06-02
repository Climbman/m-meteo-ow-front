<?php

/** 
 * @author laurynas
 * 
 */
class Control
{
    
    protected $view = null;
    protected  $data = null;
    

    /**
     */
    public function __construct(FactWDB $data, View $view) {
        $this->data = $data;
        $this->view = $view;
        
    }
    
    public function loginCheck(): bool {
        
        if (isset($_SESSION['user'])) {
            return true;
        } elseif (
            $_SERVER['REQUEST_METHOD'] === 'POST'
            && isset($_POST['login'], $_POST['user'], $_POST['pass'])
            && isset(Config::$app_users[$_POST['user']])
            && Config::$app_users[$_POST['user']] === $_POST['pass']
        ) {
            $_SESSION['user'] = $_POST['user'];
            return true;
        }
        return false;
    }
    
    public function generateResponse() {
        
        if (!$this->loginCheck()) {
            $this->view->renderLoginPage();
            exit();
        }
        
        switch($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $this->renderWithDefaults();
                break;
            case 'GET':
                if (isset($_GET['ajax'], $_GET['station'], $_GET['st_date'], $_GET['nd_date'])) {
                    $this->echoDataForAjax();
                } else {
                    $this->renderWithDefaults();
                }
                break;
        }
    }

    protected function renderWithDefaults(): void {
        $graph_data = $this->data->getWeatherData(
            Config::$defaults['station'],
            date('Y-m-d'),
            date('Y-m-d', (time() + 86400))
        );

        $this->view->renderMainView(
            Config::$graph_settings,
            Config::$defaults['parameter'],
            $this->data->getStations(),
            $graph_data,
            Config::$page_links['graph']
        );
    }

    protected function echoDataForAjax(): void {
        $graph_data = $this->data->getWeatherData(
            $_GET['station'],
            $_GET['st_date'],
            $_GET['nd_date']
        );
        $this->view->printDataJson($graph_data);
    }
    
}

