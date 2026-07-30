<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index($uf = '')
    {
        $uf = strtoupper($uf);
        helper('regional_helper');

        $regional = seleciona_regional($uf);
        if (empty($regional) || $regional == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			exit();
        }

        if($regional['desenvolvimento'] !== true){
            if($regional['email'] !== null){
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        $view_data = array(
            'html_title' => 'Fale Conosco',
            'regional_nome' => $regional['nome'],
            'regional_sigla' => $regional['sigla'],
            'regional_email' => $regional['email'],
            'regional_anexo' => $regional['anexo'],
            'redirect_regional' => $regional['redirectParecerConsulta'],
            'uf' => $uf,
            'get_uf' => $uf,
            'id_area' => null,
        );

        return view('main', $view_data);
    }
}