<?php

namespace App\Controllers;

class Site extends BaseController
{
    protected $helpers = array('date','myTools');
    //======================================================
    private function GlobalSite()
    {
        $dados = [
            'nomeSite' => "Jogo de Perguntas",
            'pulos' => 2
        ];

        return $dados;
    }

    //======================================================
    public function ini($error = '')
    {
        $tabela = new \CodeIgniter\View\Table();

        $db = db_connect();
            $dados = $db->query("select jogador,pontos,datacad from jogos order by pontos desc limit 50")->getResultArray();
        $db->close();

        $template = [
            'table_open'         => '<table id="highscore" class="table table-striped">',
            'thead_open'         => '<thead class="thead-dark">',
            'thead_close'        => '</thead>',
        ];

        $tabela -> setHeading(['Nome', 'Pontos', 'Data']);
        foreach($dados as $row):
            $tabela -> addRow($row['jogador'],$row['pontos']." pts", ConvDate($row['datacad']));
        endforeach;

        $tabela->setTemplate($template);
        $tableHTML = $tabela->generate($tabela);


        echo view('Templates/TopSite', $this->GlobalSite());
        echo view('Welcome', ['error' => $error]);
        echo view('highscore', ['tabelaHTML' => $tableHTML]);
        echo view('Templates/Rodape');
    }

    //======================================================
    public function add()
    {
        echo view('Templates/TopSite', $this->GlobalSite());

        if(session('SessionLvl') > 2):
            echo view('add', $this->GlobalSite());
        else:
            echo view('login', $this->GlobalSite());
        endif;

        echo view('Templates/Rodape');
    }

    //======================================================
    public function RunJogo()
    {
        echo view('Templates/TopSite', $this->GlobalSite());

        if(session('QuestaoAtual') > -1):
            CalcPontos('-85', '-1', session('SessionIdPlayer')); //pontos, pulos, idplayer
            if(session('jumps')):
                return redirect()->to(site_url('Site/ini/jump'));
            endif;
        endif;

        $params =[
            'idplayer' => session('SessionIdPlayer'),
        ];

        $db = db_connect();
            $dados = $db->query("select * from perguntas")->getResultArray();
            $dadosUser = $db->query("Select * from jogos where id=:idplayer:", $params)->getResultArray();
        $db->close();

        $nbQuestion = array_rand($dados, 1);

        $dadosEnv = [
            'p' => $dados[$nbQuestion],
            'u' => $dadosUser[0]
        ];


        if(session()->has('SessionIdPlayer')):
            echo view('QuestionGame', $dadosEnv);
            session()->set([
                'QuestaoAtual' => $nbQuestion
            ]);
        else:
            return redirect()->to(site_url('Site/ini'));
        endif;

        echo view('Templates/Rodapejs');
    }

    //======================================================
    public function login()
    {
        $ilogin = $this->request->getPost('login');
        $ipass = $this->request->getPost('senha');

        $params =[
            'login' => $ilogin,
            'senha' => md5($ipass)
        ];
    

        $db = db_connect();
        $dados = $db->query("Select * from usuarios where login=:login:", $params)->getRow();
        $db->close();

        if($dados->login == $ilogin && $dados->senha == md5($ipass)):
            session()->set([
                'SessionLvl' => $dados->level,
                'login' => $dados->login
            ]);
        endif;
        return redirect()->to(site_url('Site/add'));
    }

    //======================================================
    public function RespQuest($id)
    {
        $iresposta = $this->request->getPost('resp');

        $params = [
            'idquest' => $id,
        ];

        $db = db_connect();
        $dados = $db->query("Select correta from perguntas where id=:idquest:", $params)->getRow();
        $db->close();

        if($dados->correta == $iresposta):
            CalcPontos('+150', 0, session('SessionIdPlayer')); //pontos, pulos, idplayer
            session()->set([
                'QuestaoAtual' => -15
            ]);
            return redirect()->to(site_url('Site/RunJogo'));
        else:
            session()->destroy();
            return redirect()->to(site_url('Site/ini/error'));
        endif;

    }

    //======================================================
    public function logOut()
    {
        session()->destroy();
        return redirect()->to(site_url('Site/ini'));
    }

    //======================================================
    public function AdcPerg()
    {
        $params = [
            'perg' => $this->request->getPost('pergunta'),
            'resp1' => $this->request->getPost('resposta1'),
            'resp2' => $this->request->getPost('resposta2'),
            'resp3' => $this->request->getPost('resposta3'),
            'resp4' => $this->request->getPost('resposta4'),
            'correta'=> $this->request->getPost('correta')
        ];

        $db = db_connect();
        $db->query("insert into perguntas(
            pergunta,
            resp1,
            resp2,
            resp3,
            resp4,
            correta
            )values(
            :perg:,
            :resp1:,
            :resp2:,
            :resp3:,
            :resp4:,
            :correta:
            )", $params);
        $db->close();
        return redirect()->to(site_url('Site/add'));
    }

    //======================================================

    public function IniJogo()
    {

        $params = [
            'nome' => $inome = $this->request->getPost('nome'),
            'pulos' => $this->GlobalSite()['pulos'],
            'agora' => date( "Y-m-d H:i:s", now('America/Sao_Paulo')) //Função Now do helper
        ];

        $db = db_connect();
        $db->query("insert into jogos(
            jogador,
            pulos,
            datacad
            )values(
            :nome:,
            :pulos:,
            :agora:
            )", $params);

            $dados = $db->query("select id from jogos where datacad=:agora: and jogador=:nome:", $params)->getRow();
        $db->close();

        echo $dados->id;

        session()->set([
            'SessionIdPlayer' => $dados->id,
            'QuestaoAtual' => -15
        ]);
        return redirect()->to(site_url('Site/RunJogo'));
    }
}


