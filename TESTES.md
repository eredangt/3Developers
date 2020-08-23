# Testes

- Programas

    PHPUnit - Versão: 9 [Link](https://phpunit.de/getting-started/phpunit-9.html)
    
    Composer - Versão: 1.10.10 [Link](https://getcomposer.org/)
    
    Xdebug - Versão: 2.9.6 [Link](https://xdebug.org)
    
    TestingExpress - Versão: 1.0.0.9 [Link](http://testingexpress.com.br/index.html)
    
    Selenium - Versão: ?.?.?
- Comandos

    Todos os comandos a seguir devem ser executados no diretório do repositório.
    - Teste unitário
    
        Pré-requisitos:
        ```
        PHP
        PHPUnit
        ```
        
        `$ phpunit <DiretorioDosTestes>/<SubDiretorioDosTestes>/.../<NomeDoTeste>.php`
        
        Exemplo: `$ phpunit testes/Modelo/TesteInstrutor.php`
    - Teste de cobertura
    
        Pré-requisitos:
        ```
        PHP
        PHPUnit
        Composer
        Xdebug
        ```
        
        `$ phpunit --coverage-html <NomeDaPasta>`
        
        Exemplo: `$ phpunit --coverage-html TesteDeCobertura`
