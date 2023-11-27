$(function(){
  $("#form-test").on("submit",function(){
    nome_input = $("input[name='nome']");
    email_input = $("input[name='email']");
    user_input = $("input[name='user']");
    senha_input = $("input[name='senha']");
    senhaconf_input = $("input[name='senhaconf']");

    if(nome_input.val() == "" || nome_input.val() == null)
    {
      $("#erro-nome").html("O nome é obrigatorio");
      return(false);
    }

    if(email_input.val() == "" || email_input.val() == null)
    {
      $("#erro-email").html("O email é obrigatorio");
      return(false);
    }

    if(user_input.val() == "" || user_input.val() == null)
    {
      $("#erro-user").html("O usuário é obrigatorio");
      return(false);
    }

    if(senha_input.val() == "" || senha_input.val() == null)
    {
      $("#erro-senha").html("A senha é obrigatorio");
      return(false);
    }

    if(senhaconf_input.val() == "" || senhaconf_input.val() == null)
    {
      $("#erro-senhaconf").html("A confirmação da senha é obrigatorio");
      return(false);
    }


    return(true);
    
  });
});
