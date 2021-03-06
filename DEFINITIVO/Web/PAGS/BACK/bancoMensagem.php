<?php
    function enviarComum($conexao, $remetente, $conteudo, $anonimato) {
        
        $sql = "insert into mensagem values (default, '$remetente', 17305, '$conteudo', '$anonimato', default,'N',null,'N',null,'N',null);";
        return mysqli_query($conexao, $sql);
    }

    function enviarOrientador($conexao, $destinatario, $remetente, $conteudo) {
        
        $sql = "insert into mensagem values (default, '$remetente', '$destinatario', '$conteudo', default, default,'N',null,'N',null,'N',null);";
        return mysqli_query($conexao, $sql);
    }
    
    
    function ler($conexao, $cod_mensagem) {
        $sql = "call MARCA_LIDA($cod_mensagem)";
        return mysqli_query($conexao,$sql);
    }
    
    function excluirDestinatario($conexao, $cod_mensagem) {
        $sql = "call MARCA_EXCLUIDA_DESTINATARIO('$cod_mensagem')";
        //$sql = "delete from mensagem where cod_mensagem = $cod_mensagem";
        return mysqli_query($conexao,$sql);
    }

    function excluirRemetente($conexao, $cod_mensagem) {
        $sql = "call MARCA_EXCLUIDA_REMETENTE('$cod_mensagem')";
        //$sql = "delete from mensagem where cod_mensagem = $cod_mensagem";
        return mysqli_query($conexao,$sql);
    }

    function listaMensagensRecebidas($conexao, $cod) {
        $mensagens = array();
        $resultado = mysqli_query($conexao, "call CAIXA_ENTRADA('$cod')");//select * from mensagem where (remetente =  '$cod' || destinatario = '$cod') && (stautsLida = 'N' && statusExcluida = 'N')"
        
        while ($mensagem = mysqli_fetch_assoc($resultado)) {
            array_push($mensagens, $mensagem);
        }
        return $mensagens;
    }

    function listaMensagensEnviadas($conexao, $cod) {
        $mensagens = array();
        $resultado = mysqli_query($conexao, "call CAIXA_ENVIADAS('$cod')");//select * from mensagem where (remetente =  '$cod' || destinatario = '$cod') && (stautsLida = 'N' && statusExcluida = 'N')"
        
        while ($mensagem = mysqli_fetch_assoc($resultado)) {
            array_push($mensagens, $mensagem);
        }
        return $mensagens;
    }
    
    function listaMensagensLidas($conexao,$cod) {
        $mensagens = array();
        $resultado = mysqli_query($conexao, "call CAIXA_LIDAS('$cod')");//select * from mensagem where (remetente =  '$cod' || destinatario = '$cod') && (stautsLida = 'S' && statusExcluida = 'N')"
        
        while ($mensagem = mysqli_fetch_assoc($resultado)) {
            array_push($mensagens, $mensagem);
        }
        return $mensagens;
    }

    function busca($conexao, $cod_mensagem) {
        $resultado = mysqli_query($conexao,
                "select * from mensagem where id_mensagem=$cod_mensagem");
        return mysqli_fetch_assoc($resultado);
    }
    

