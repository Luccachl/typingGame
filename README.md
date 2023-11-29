# Typing
Trabalho desenvolvido para a matéria de Desenvolvimento Web para o professor Alex Kutzke.
Alunos: Lucca Haj Mussi Chella Paranhos Silva e Leonardo dos Santos Correia.

#Recursos
O programa foi desenvolvido usando:
..*HTML;
..*CSS;
..*Bootstrap;
..*Javascript;
..*AJAX;
..*PHP;
..*SQL;
..*XAMPP.

#Código
..*HTML: O html foi utilizado para definir o esqueleto da página, assim como classes e id's.
..*Javascript: O Javascript foi utilizado para escrever a lógica do funcionamento do jogo, e dentro dele foi utilizado também o AJAX, para conectar o score final com o PHP e por fim com o usuário no banco.
..*PHP: O PHP foi utilizado para conectar o site com o banco, desde o sistema de cadastro, login, até o sistema de guardar scores e a disposição de tabelas, bem como a entrada em ligas, mantendo a sessão do usuário salva.
..*SQL: O SQL foi utilizado dentro do PHP em QUERY's. O SGBD utilizado foi o MySQL, e por meio dele foram criadas as 4 tabelas; Usuarios, Partidas, Ligas e Incricoesligas, dentro do banco typing.
..*XAMPP: O XAMPP permitiu o funcionamento do programa em um servidor local, tornando possivel vizualisar as partes escritas em PHP.

#Funcionamento
    A aplicação inicia pelo index.html, onde o usuário tem duas opções "Logar" ou "Registrar". Caso o usuário escolha "Logar", ele será direcionado para login.php, onde será necessario a inserção do nome de usuário e da senha. Caso o usuário escolhe "Registrar", ele será direcionado para register.php, e então poderá se registrar com: Nome, Usuário, Email, Senha e Confirmação da Senha. Após registrar ele será direcionado para login.php. Para registrar o arquivo usado é o check_form.php, o qual insere os dados do usuário na tabela Usuário. Ja para logar, é usado o arquivo check_login.php, o qual consulta o banco para validar a entrada da usuário.
    Após logar o usuário será direcionado para menu.php, e terá as opções: Jogar, Ligas, Pontuação/Histórico e Sair.
    Caso o usuário selecione "Jogar", ele será direcionado para game.html, em que por meio do game.js, será gerado um lorem com ordem de palavras aleatório, e o cronômetro de 60 segundos começara a contagem. Quando o usuário pressiona uma tecla, uma função de validação é chamada. A validação funciona da seguinte maneira: o programa recebe a letra que o usuário digitou e compara com a letra atual no texto do jogo. Caso ela esteja correta ela chama a função para colorir a letra com true, e ele é pintada de verde, a função set Scrore também é chamada aumentando o score do usuário em 1, caso incorreto, o contrario ocorre. Toda vez que o número fixo de 20 palavras acaba, o jogo chama a função reset game, a qual dispoem mais 20 palavras para o usuário seguir o jogo. Isso ocorre até o cronômetro chegar em 0. Quando o cronômetro zera, o jogo se encerra e o usuário pode ver seu score, e voltar para o menu. O arquivo score.php, é responsavel por enviar os dados do score, para a tabela partidas, levando consigo o id do usuário que jogou.
    Caso o usuário selecione "Ligas", ele será direcionado para ligas.php. Nessa página o usuário, poderá criar uma liga, entrar em uma liga e ver a tabela de score de sua liga. A criação de ligas é feita por meio do arquivo criar_ligas.php, onde valida e insere os dados na tabela Ligas. Caso o usuário entre em uma liga seu id será enviado para a tabela IncricaoLigas, e ele terá acesso aos scores dentro de sua liga.
    Caso o usuário selecione Pontuação/Histórico, ele será direcionado para historico.php. Nessa página o usuário terá acesso ao histórico de partidas, ao score geral, e ao score geral de ligas. Isso é feito por meio de 3 consultas.
    Caso o usuário selecione "Sair", ele será enviado para index.html, e terá as duas opções ja citadas.
    
