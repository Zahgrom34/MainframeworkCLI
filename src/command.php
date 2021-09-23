<?php

  namespace Mainframeworkcli;


  class command extends configurate{

      function __construct($version){
        $PHP = phpversion();
        $CLI = $this->version();
        system("clear");
        echo "\e[0;36m ___       ___    ___    ___       ___   \n";
        echo "|   |\   /|   |  |   |  |   |\ \  |   |  \n";
        echo "|   |\ _//|   |  |   |  |   | \ \ |   |   \n";
        echo "|   | \_/ |   |  |   |  |   |  \ \|   |  \n";
        echo "|___|     |___|  |___|  |___|   \ ____|\e[0m\n";
        echo "\n\e[1;37;45mMIN CLI\e[0m\n";
        echo "\e[1;37;44mCLI version {$CLI}!\e[0m\n\e[0;30;47mUsing PHP version: {$PHP}\e[0m\n";
              $command = readline('Выполнение операции (Введите команду): ');
            $this->parseCommand($command, $version);
      }

      public function version(){
        return '0.1';
      }

      public function parseCommand($cmd, $version){
        
        switch ($cmd) {
          case 'version':
              echo $version;
              break;

          case 'create-configuration':

                $MainFrameworkConfigure = readline("Введите новое название конфигурации: ");
                if(!empty($MainFrameworkConfigure)){
                  $this->createConfig($MainFrameworkConfigure);
                }
                else{
                  echo 'Ошибка параметра, вы не можете оставить название конфигурации пустым!';
                }
                
              break;
              
          case 'create-controller':
              $MainFrameworkController = readline("Название нового контроллера: ");
              if(!empty($MainFrameworkController)){
                $Controller = new AbstractController();
                $Controller->CreateController(str_replace('Controller', '', $MainFrameworkController));
              }
              else{
                echo 'Ошибка параметра, вы не можете оставить название конфигурации пустым!';
              }

              break;
            
          default:
              // Если параметр нам не подходит, или его нет, говорим об ошибке
              echo "Ошибка параметра, воспользуйтесь справкой \n";
              break;
      }
      echo "\n"; // Делаем ещё один перевод строки, что бы отделить вывод программы
      }

  }