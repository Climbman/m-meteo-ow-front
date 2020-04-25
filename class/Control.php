<?php

/** 
 * @author laurynas
 * 
 */
class Control
{
    
    private $view = null;
    private $data = null;
    

    /**
     */
    public function __construct(FactWDB $data, View $view) {
        $this->data = $data;
        $this->view = $view;
        
    }
    
    public function checkLogin(): void {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST'
            && isset($_POST['login'], $_POST['user'], $_POST['pass'])
            && isset(Config::$app_users[$_POST['user']])
            && Config::$app_users[$_POST['user']] === $_POST['pass']
            ) {
                $_SESSION['user'] = $_POST['user'];
            }
            
        if (!isset($_SESSION['user'])) {
            $this->view->renderLoginPage();
            exit();
        }   
    }
    
    public function generateResponse() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $stations = $this->data->getStations();
            
            $graph_data = $this->data->getWeatherData(
                Config::$defaults['station'],
                date('Y-m-d'),
                date('Y-m-d', (time() + 86400))
            );
            
            $this->view->renderMainView(
                Config::$param_names,
                Config::$defaults['parameter'],
                $stations,
                $graph_data,
                Config::$page_links['graph']
            );
            exit();
        }
        if (
            $_SERVER['REQUEST_METHOD'] === 'GET'
            && isset($_GET['station'])
            && isset($_GET['st_date'], $_GET['nd_date'])
            
        ) {
            $graph_data = $this->data->getWeatherData(
                $_GET['station'],
                $_GET['st_date'],
                $_GET['nd_date']
            );
            
            $this->view->printDataJson($graph_data);
            exit();
        }
    }
    
    public function test() {
        
        $data = $this->data;
        
        
        $stations = $data->getStations();
        
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', (time() + 86400));
        
        $graph_data = $data->getWeatherData(Config::$defaults['station'], $start_date, $end_date);
        
        var_dump($stations);
        var_dump($graph_data);
    }
    
}

