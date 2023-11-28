Contexto: 

Um processo comum para atacar webservers e aplicações web, trata-se de utilizar técnicas de brute force de arquivos e diretórios e web fuzzing, com o objetivo de identificar aplicações, informações sensíveis ou arquivos e diretórios que possam ser utilizados durante um ataque. 

Existem muitas ferramentas que realizam essas atividades tais como, dirb, gobuster, wfuzz, etc. A maioria das ferramentas fazem o mapeamento identificando padrões baseado no comportamento do protocolo HTTP, normalmente utilizando o status code como resultado.

O que o hardesec faz?

Minha ideia ao criar esse script foi tentar remover padrões esperados e baseados no funcionamento normal do protocolo HTTP, ou seja, ao configurar o hardesec no seu webserver, tudo que não existir (arquivos e diretórios) será retornado com conteúdo, tamanhos, títulos e respostas aleatórias, confundindo assim as ferramentas e os atacantes.

Onde foi testado?

Ubuntu 22.04.3 LTS
Apache2 2.4.52
PHP 8

Como utilizar?

Coloque os arquivos .htaccess e hardesec.php na raiz do web server ou no diretórios da aplicação, por exemplo:

/var/www/html/

ou 

/var/www/html/mywebapp/

No arquivo de configuração do apache, garanta que a diretiva AllowOverride esteja como ALL, por exemplo:

/etc/apache2/apache2.conf

<Directory /var/www/>
    Options FollowSymLinks
    AllowOverride ALL
    Require all granted
</Directory>

Reinicie o serviço

systemctl restart apache2

Como funciona?

Quando for solicitado algum recurso que não existe no servidor (tanto arquivo quanto diretório), o servidor irá retornar uma resposta aleatória. 


