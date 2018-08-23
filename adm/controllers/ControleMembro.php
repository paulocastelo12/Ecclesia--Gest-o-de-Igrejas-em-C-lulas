<?php

class ControleMembro {

    private $Dados;
    private $Dados_editar;
    private $UserId;

    public function index() {

        $ListarMembro = new ModelsMembro();
        $this->Dados = $ListarMembro->listar();

        $CarregarView = new ConfigView("membro/Membro", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarMembro() {

        $ListarGrupo = new ModelsGrupo();
        $this->Dados = $ListarGrupo->listar();

        $CarregarView = new ConfigView("membro/CadastrarMembro", $this->Dados);
        $CarregarView->renderizar();
    }

    public function salvarMembro() {

        $memnome = filter_input(INPUT_POST, 'memnome', FILTER_DEFAULT);
        $memrg = filter_input(INPUT_POST, 'memrg', FILTER_DEFAULT);
        $memsexo = filter_input(INPUT_POST, 'memsexo', FILTER_DEFAULT);
        $memestadocivil = filter_input(INPUT_POST, 'memestadocivil', FILTER_DEFAULT);
        $memdatanasc = filter_input(INPUT_POST, 'memdatanasc', FILTER_DEFAULT);
        $memgrupo = filter_input(INPUT_POST, 'memgrupo', FILTER_DEFAULT);
        $memstatus = "Ativo";

        $mememail = filter_input(INPUT_POST, 'mememail', FILTER_DEFAULT);
        $memtelefone = filter_input(INPUT_POST, 'memtelefone', FILTER_DEFAULT);

        $cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_DEFAULT);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
        $uf = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
        $rua = filter_input(INPUT_POST, 'rua', FILTER_DEFAULT);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_DEFAULT);
        $complemento = filter_input(INPUT_POST, 'complemento', FILTER_DEFAULT);

        //Salvar Dados pessoas

        $membro = new Membro();

        $membro->setMemnome($memnome);
        $membro->setMemrg($memrg);
        $membro->setMemsexo($memsexo);
        $membro->setMemdatanasc($memdatanasc);
        $membro->setMemestadocivil($memestadocivil);
        $membro->setMemstatus($memstatus);
        $membro->setMemgrupo($memgrupo);

        $Dados = [
            'memnome' => $membro->getMemnome(),
            'memrg' => $membro->getMemrg(),
            'memsexo' => $membro->getMemsexo(),
            'memestadocivil' => $membro->getMemestadocivil(),
            'memdatanasc' => $membro->getMemdatanasc(),
            'memgrupo' => $membro->getMemgrupo(),
            'memstatus' => $membro->getMemstatus()
        ];

        $CadastrarMembro = new ModelsMembro();
        $CadastrarMembro->cadastrar($Dados);

        //Retornar id Membro

        $ListarMembro = new ModelsMembro();

        $this->Dados = $ListarMembro->listarPorNome($memnome);

        //Salvar Contato
        foreach ($this->Dados as $membro) {
            $conmemcod = $membro['memcod'];
            $endmemcod = $membro['memcod'];
        }

        $contato = new Contato();

        $contato->setConemail($mememail);
        $contato->setContelefone($memtelefone);
        $contato->setConmemcod($conmemcod);

        $Dados2 = [
            'conmemcod' => $contato->getConmemcod(),
            'conemail' => $contato->getConemail(),
            'contelefone' => $contato->getContelefone()
        ];

        $CadastrarContato = new ModelsContato();
        $CadastrarContato->cadastrar($Dados2);

        //Salvar Endereco

        $endereco = new Endereco();

        $endereco->setCep($cep);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        $endereco->setRua($rua);
        $endereco->setNumero($numero);
        $endereco->setComplemento($complemento);
        $endereco->setForendcod($endmemcod);

        $Dados3 = [
            'cep' => $endereco->getCep(),
            'bairro' => $endereco->getBairro(),
            'cidade' => $endereco->getCidade(),
            'uf' => $endereco->getUf(),
            'rua' => $endereco->getRua(),
            'numero' => $endereco->getNumero(),
            'complemento' => $endereco->getComplemento(),
            'forendcod' => $endereco->getForendcod()
        ];

        //var_dump($Dados3);

        $CadastrarEndereco = new ModelsEndereco();
        $CadastrarEndereco->cadastrar($Dados3);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id=' . $UserId . " ";
        if (!empty($this->UserId)):
            $ListarIdMembro = new ModelsMembro();
            $this->Dados = $ListarIdMembro->listarPorId($UserId);

            $ListarGrupo = new ModelsGrupo();
            $this->Dados_editar = $ListarGrupo->listar();

            $CarregarView = new ConfigView("membro/EditarMembro", $this->Dados, $this->Dados_editar);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['memnome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editarMembroDados() {

        $memcod = filter_input(INPUT_POST, 'memcod', FILTER_DEFAULT);
        $memnome = filter_input(INPUT_POST, 'memnome', FILTER_DEFAULT);
        $memrg = filter_input(INPUT_POST, 'memrg', FILTER_DEFAULT);
        $memsexo = filter_input(INPUT_POST, 'memsexo', FILTER_DEFAULT);
        $memestadocivil = filter_input(INPUT_POST, 'memestadocivil', FILTER_DEFAULT);
        $memdatanasc = filter_input(INPUT_POST, 'memdatanasc', FILTER_DEFAULT);
        $memgrupo = filter_input(INPUT_POST, 'memgrupo', FILTER_DEFAULT);
        $memstatus = "Ativo";

        //Salvar Dados pessoas
        $membro = new Membro();

        $membro->setMemnome($memnome);
        $membro->setMemrg($memrg);
        $membro->setMemsexo($memsexo);
        $membro->setMemdatanasc($memdatanasc);
        $membro->setMemestadocivil($memestadocivil);
        $membro->setMemstatus($memstatus);
        $membro->setMemgrupo($memgrupo);

        $Dados = [
            'memnome' => $membro->getMemnome(),
            'memrg' => $membro->getMemrg(),
            'memsexo' => $membro->getMemsexo(),
            'memestadocivil' => $membro->getMemestadocivil(),
            'memdatanasc' => $membro->getMemdatanasc(),
            'memgrupo' => $membro->getMemgrupo(),
            'memstatus' => $membro->getMemstatus()
        ];

        //var_dump($Dados);

        $EditarMembro = new ModelsMembro();
        $EditarMembro->alterar($Dados, $memcod);
    }

    public function editarMembroContato() {

        $memconcod = filter_input(INPUT_POST, 'memconcod', FILTER_DEFAULT);
        $mememail = filter_input(INPUT_POST, 'mememail', FILTER_DEFAULT);
        $memtelefone = filter_input(INPUT_POST, 'memtelefone', FILTER_DEFAULT);

        $contato = new Contato();

        $contato->setConemail($mememail);
        $contato->setContelefone($memtelefone);


        $Dados = [
            'conemail' => $contato->getConemail(),
            'contelefone' => $contato->getContelefone()
        ];

        $EditarMembro = new ModelsMembro();
        $EditarMembro->alterarContato($Dados, $memconcod);
    }

    public function editarMembroEndereco() {

        $endcod = filter_input(INPUT_POST, 'endcod', FILTER_DEFAULT);
        $cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_DEFAULT);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
        $uf = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
        $rua = filter_input(INPUT_POST, 'rua', FILTER_DEFAULT);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_DEFAULT);
        $complemento = filter_input(INPUT_POST, 'complemento', FILTER_DEFAULT);

        $endereco = new Endereco();

        $endereco->setCep($cep);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        $endereco->setRua($rua);
        $endereco->setNumero($numero);
        $endereco->setComplemento($complemento);
       

        $Dados = [
            'cep' => $endereco->getCep(),
            'bairro' => $endereco->getBairro(),
            'cidade' => $endereco->getCidade(),
            'uf' => $endereco->getUf(),
            'rua' => $endereco->getRua(),
            'numero' => $endereco->getNumero(),
            'complemento' => $endereco->getComplemento()
        ];


        $EditarMembro = new ModelsMembro();
        $EditarMembro->alterarEndereco($Dados, $endcod);
        // var_dump($Dados);
    }

    public function desativarMembro() {

        $memcod = filter_input(INPUT_POST, 'memcod', FILTER_DEFAULT);
        $memstatus = filter_input(INPUT_POST, 'memstatus', FILTER_DEFAULT);
        
        $membro = new Membro();
        
        $membro->setMemstatus($memstatus);
        
        $Dados = [
            'memstatus' => $membro->getMemstatus()
        ];

        $AlterarMembro = new ModelsMembro();
        $AlterarMembro->alterar($Dados, $memcod);
        //var_dump($Dados);
    }

}
