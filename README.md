Para rodar o meu projeto é simples!

Apos abrir ele, será necessario puxar algumas dependencias antes!
Lembre-se! meu projeto foi feito em php, utilizando laravel, de preferencia tenha o php instalado,
juntamente do composer! dai é so rodar os seguintes comandos RUN

Toda e qualquer vez que apresentar o comando RUN: o que representa e a escrita do comando apos ele, ignorar RUN: no seu terminal,

RUN: composer install
obs: nesse caso ira rodar somente o "composer install"

Apos isso, seus pacotes estarao alinhados com o meu projeto! inicie o projeto!
RUN: php artisan serve

se acessar a URL: http://localhost:8000 ou http://localhost:8000/api/personagens, ira ver a tela de apresentação do laravel, ou a mensagem ""Nenhum personagem encontrado"",
isso ira depender de qual URL escolheu para testar o inicio do projeto!

Isso significa que até aqui está tudo certo para rodar o projeto!


Ocasionalmente TUDO QUE PRECISAR PRESTAR CODE REVIEW, nesse caso se encontra em
problem-crud-powers/app/Http/
problem-crud-powers/app/Models/

problem-crud-powers/database/

problem-crud-powers/routes/api

entre outros secundarios!


A partir de agora, podera seguir com o codereview, e testar as API's, recomendo fortemente o uso do insomnia para os testes!
Aqui está um export completo de todas as rotas que foram solicitadas e entregues!
https://drive.google.com/file/d/17paGpHkxf5KX3cXWgiyS9z2eAIu0XjHJ/view?usp=sharing

Apos instalar, abrir o insomnia, Criar um novo projeto, nomear com oque preferir, dentre as duas opções que apresentaram, pode escolher o Cloud Sync mesmo!
Apos criar, verá um botão de "Import" no centro da tela na parte superir, pode selecionar, e apos apresentar o modal, clique em "Choose Files"
Procure aonde instalou o arquivo Insomnia que disponibilizei, DE PREFERENCIA, SELECIONE EXPLORADOR DE ARQUIVOS, A OPÇÃO "TODOS OS ARQUIVOS", ele ira aparecer em seguinte, e pode selecionar
Clique em Scan, apos isso, Import, e é so clicar em cima do item que foi gerado!, 

Deixei todas as rotas criadas e separadas por pastas, pra facilitar a visualização!

Lembrando que o banco foi utilizado em sqlite, ou seja, pode rodar sem problemas apos iniciar o projeto com aquele comandinho la de cima "php artisan serve"
Pra ficar mais pratico, deixei as rotas com id 1, e resetei a database, para não subir nada com infos criadas e confundir as ideias!

Todas as rotas estão iniciadas com id = 1, (lembrando que a base está zerada), inicia com id 1, mas não ira retornar algumm index, ou show, se não criar nada!


Começe testando o code review, e apos isso, utilize minhas API's de store, pra poder criar e testar todos os casos!

Se tiver duvidas, meu e-mail está anexado no forms que foi enviado, pode entrar em contato que retorno quaisquer duvidas!