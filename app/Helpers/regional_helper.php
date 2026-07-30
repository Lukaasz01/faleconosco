<?php
use CodeIgniter\CodeIgniter;
use CodeIgniter\Exceptions\PageNotFoundException;

    function seleciona_regional($sigla_uf){

        switch($sigla_uf){

                    case 'BR':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => true,
                            'nome'  => 'Conselho Federal de Medicina',
                            'sigla' => 'CFM',
                            'email' => array(
                                'Geral' => 'cfm@portalmedico.org.br',
								'Parecer/Consulta' => 'https://parecerconsulta.cfm.org.br/BR',
                                'Setor de Imprensa' => 'imprensa@portalmedico.org.br',
                                'Biblioteca' => 'biblioteca@portalmedico.org.br',
                                'Ouvidoria' => 'cfm@portalmedico.org.br'
                            ),
                        );

                        break;


                    case 'AC':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Acre',
                            'sigla' => 'CRM-AC',
                            'email' => array(
                                'Geral' => 'crmac@crmac.org.br',
                                'Secretaria Executiva' => 'secex@crmac.org.br',
                                'Pessoa Física' => 'registropf@crmac.org.br',
                                'Pessoa Jurídica' => 'registropj@crmac.org.br',
                                'Setor de Processos' => 'sepro@crmac.org.br',
                                'Assessoria Jurídica' => 'sejur@crmac.org.br',
                                'Assessoria de Imprensa' => 'imprensacrmac@crmac.org.br',
                                'Setor de TI' => 'ti@crmac.org.br',
                                'Tesouraria' => 'tesouraria@crmac.org.br',
                                'Ouvidoria' => 'protocolo@crmac.org.br',
                            ),

                        );
                        break;
                        
                    case 'AL':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado de Alagoas',
                            'sigla' => 'CREMAL',
                            'email' => array(
                                'Geral' => 'faleconosco@crmal.org.br',                                                
                            ),
                        );
                        break;

                    case 'AM':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Amazonas',
                            'sigla' => 'CREMAM',
                            'email' => array(
                                'Geral' => 'protocolo.cremam@portalmedico.org.br',                                                
                            ),
                        );
                        break;

                    case 'AP':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Amapá',
                            'sigla' => 'CREMAP',
                            'email' => array(
                                'Geral' => 'crmap@portalmedico.org.br',
                            ),
                        );
                        break;

                    case 'BA':
						$regional = null;
                        // $regional = array(
                            // 'desenvolvimento' => true,
                            // 'anexo'=> true,
                            // 'redirectParecerConsulta' => false,
                            // 'nome'  => 'Conselho Regional de Medicina do Estado da Bahia',
                            // 'sigla' => 'CREMEB',
                            // 'email' => array(
                                // 'Geral' => 'cremeb@cremeb.org.br',
                            // ),
                        // );
                        break;

                    case 'CE':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Ceará',
                            'sigla' => 'CREMEC',
                            'email' => array(
                                'Geral' => 'cremec@cremec.org.br'
                            ),
                        );
                        break;

                    case 'DF':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Distrito Federal',
                            'sigla' => 'CRM-DF',
                            'email' => array(
                                'Assessoria de Comunicação' => 'ouvidoria@crmdf.org.br',
                                'Ouvidoria' => 'ouvidoria@crmdf.org.br',
                            ),
                        );
                        break;

                    case 'ES':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Espiríto Santo',
                            'sigla' => 'CRM-ES',
                            'email' => array(
                                'Registro de Médico' => 'medico@crmes.org.br',
                                'Registro de Empresa' => 'empresa@crmes.org.br',
                                'Financeiro' => 'cobranca@crmes.org.br',
                                'Tribunal de Ética' => 'tetica@crmes.org.br',
                                'Comunicação' => 'comunicacao@crmes.org.br',
                                'Canal do Estudante' => 'comunicacao@crmes.org.br',
                                'Geral' => 'protocolo@crmes.org.br',
                            ),
                        );
                        break;

                    case 'GO':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Goías',
                            'sigla' => 'CREMEGO',
                            'email' => array(
                                'CREMEGO' => 'cremego@cremego.org.br',
                            ),
                        );
                        break;

                    case 'MA':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Maranhão',
                            'sigla' => 'CRM-MA',
                            'email' => array(
                                'Geral' => 'protocolo@crmma.org.br',
                                'Imprensa' => 'secretaria@crmma.org.br',
                            ),
                        );
                        break;


                    case 'MG':
						$regional = array(
							'desenvolvimento' => true,
							'anexo'           => true,
							'redirectParecerConsulta' => false,
							'nome'            => 'Conselho Regional de Medicina do Estado de Minas Gerais',
							'sigla'           => 'CRM-MG',
							'email'           => array(
								'Geral'     => 'atendimento@crmmg.org.br'
							),
						);
						break;

                    case 'MT':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Mato Grosso',
                            'sigla' => 'CRM-MT',
                            'email' => array(
                                'Geral' => 'ouvidoria@crmmt.org.br',
                                'Ouvidoria' => 'ouvidoria@crmmt.org.br',
                            ),
                        );
                        break;
                            
                    case 'MS':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Mato Grosso do Sul',
                            'sigla' => 'CRM-MS',
                            'email' => array(
                                'Presidente' => 'presidente@crmms.org.br',
                                'Fiscalização' => 'fiscalizacao@crmms.org.br',
                                'Codame' => 'codame@crmms.org.br',
                                'Sindicância' => 'sindicancia@crmms.org.br',
                                'Processo' => 'processo@crmms.org.br',
                                'Juridico' => 'juridico@crmms.org.br',
                                'Registro Pessoa Física' => 'registropf@crmms.org.br',
                                'Registro Pessoa Jurídica' => 'registropj@crmms.org.br',
                                'Protocolo' => 'crmms@crmms.org.br',
                                'Tecnologia' => 'tecnologia@crmms.org.br',
                                'Contabilidade' => 'contabil@crmms.org.br',
                                'Financeiro' => 'financeiro@crmms.org.br',
                                'Compras e Contratos' => 'comprasecontratos@crmms.org.br'
                            ),
                        );
                        break;
                                
                    case 'PA':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Pará',
                            'sigla' => 'CREMEPA',
                            'email' => array(
                                'Médico' => 'medico@cremepa.org.br',
                                'Empresa' => 'prestador@cremepa.org.br',
                                'Financeiro' => 'anuidade@cremepa.org.br',
                                'Especialidades' => 'julia@cremepa.org.br',
                                'Assessoria Jurídica' => 'assjuridica@cremepa.org.br',
                            ),
                        );
                        break;
                                        
                    case 'PB':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado da Paraíba',
                            'sigla' => 'CRM-PB',
                            'email' => array(
                                'Ouvidoria' => 'ouvidoria@crmpb.org.br',
                            ),
                        );
                        break;
					
					case 'PE':
						$regional = null;
						exit();

                    case 'PI':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Piauí',
                            'sigla' => 'CRM-PI',
                            'email' => array(
                                'Atendimento' => 'atendimento@crmpi.org.br',
                            ),
                        );
                        break;

                    case 'PR':
						$regional = null;
                        // $regional = array(
                            // 'desenvolvimento' => false,
                            // 'anexo'=> true,
                            // 'redirectParecerConsulta' => false,
                            // 'nome'  => 'Conselho Regional de Medicina do Estado do Paraná',
                            // 'sigla' => 'CRM-PR',
                            // 'email' => null,
                        // );
                        break;

                    case 'RN':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado do Rio Grande do Norte',
                            'sigla' => 'CREMERN',
                            'email' => array(
                                'Atendimento' => 'atendimento@cremern.org.br',
                            ),
                        );
                        break;

                    case 'RS':
						$regional = null;
                        // $regional = array(
                            // 'desenvolvimento' => false,
                            // 'anexo'=> true,
                            // 'redirectParecerConsulta' => false,
                            // 'nome'  => 'Conselho Regional de Medicina do Estado do Rio Grande do Sul',
                            // 'sigla' => 'CREMERS',
                            // 'email' => null,
                        // );
                        break;

                    case 'RO':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado de Rôndonia',
                            'sigla' => 'CRM-RO',
                            'email' => array(
                                'Ouvidoria' => 'ouvidoria@cremero.org.br',
                            ),
                        );
                        break;
                        
                    case 'RR':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome'  => 'Conselho Regional de Medicina do Estado de Roraima',
                            'sigla' => 'CRM-RR',
                            'email' => array(
                                'Tesouraria' => 'crmrr@portalmedico.org.br',
                                'Atendimento Pessoa Física' => 'crmrr@portalmedico.org.br',
                                'Atendimento Pessoa Jurídica' => 'crmrr@portalmedico.org.br',
                                'Outros' => 'crmrr@portalmedico.org.br',
                            ),
                        );
                        break;

                    case 'SC':
						$regional = null;
                        // $regional = array(
                            // 'desenvolvimento' => false,
                            // 'anexo'=> true,
                            // 'redirectParecerConsulta' => false,
                            // 'nome'  => 'Conselho Regional de Medicina do Estado de Santa Catarina',
                            // 'sigla' => 'CREMESC',
                            // 'email' => null,
                        // );
                        break;
                                    
                    case 'SE':
                        $regional = array(
                            'desenvolvimento' => true,
                            'anexo'=> true,
                            'redirectParecerConsulta' => false,
                            'nome' => 'Conselho Regional de Medicina do Estado de Sergipe',
                            'sigla' => 'CREMESE',
                            'email' => array(
                                'Atendimento' => 'contato@cremese.org.br',
                            ),
                        );
                        break;

                    case 'SP':
						$regional = null;
                        // $regional = array(
                            // 'desenvolvimento' => false,
                            // 'anexo'=> true,
                            // 'redirectParecerConsulta' => false,
                            // 'nome' => 'Conselho Regional de Medicina do Estado de São Paulo',
                            // 'sigla' => 'CREMESP',
                            // 'email' => null,
                        // );
                        break;
                        
                        case 'TO':
                            $regional = array(
                                'desenvolvimento' => true,
                                'anexo'=> true,
                                'redirectParecerConsulta' => false,
                                'nome' => 'Conselho Regional de Medicina do Estado de Tocantins',
                                'sigla' => 'CRM-TO',
                                'email' => array(
                                    'Pessoa Física' => 'crmto@portalmedico.org.br',
                                    'Pessoa Jurídica' => 'crmto@portalmedico.org.br',
                                    'Corregedoria' => 'crmto@portalmedico.org.br',
                                    'Processo Consulta' => 'crmto@portalmedico.org.br',
                                    'Fiscalização' => 'crmto@portalmedico.org.br',
                                    'Educação Médica Continuada' => 'crmto@portalmedico.org.br',
                                ),
                            );
                            break;

                        case 'RJ':
                            $regional = array(
                                'desenvolvimento' => false,
                                'anexo'=> true,
                                'redirectParecerConsulta' => false,
                                'nome' => 'Conselho Regional de Medicina do Estado do Rio de Janeiro',
                                'sigla' => 'CREMERJ',
                                array(
                                    '1. Anuidades e Taxas (PF e PJ)' => 'erodrigues@crm-rj.gov.br',
                                    '2. Certidões' => 'erodrigues@crm-rj.gov.br',
                                    '3. Desconto 80% PJ' => 'erodrigues@crm-rj.gov.br',
                                    '4. Documentação (diploma, histórico etc)' => 'erodrigues@crm-rj.gov.br',
                                    '5. Extravio de documentos' => 'erodrigues@crm-rj.gov.br',
                                    '6. Eventos e cursos' => 'erodrigues@crm-rj.gov.br',
                                    '7. Fiscalização' => 'erodrigues@crm-rj.gov.br',
                                    '8. Inscrição e cancelamento de CRM; Transferência; Secundária' => 'erodrigues@crm-rj.gov.br',
                                    '9. Normas, Pareceres e Resoluções' => 'erodrigues@crm-rj.gov.br',
                                    '10. PCMSO (Registro e Baixa)' => 'erodrigues@crm-rj.gov.br',
                                    '11. RQE' => 'erodrigues@crm-rj.gov.br',
                                    '12. Serviços online (senha, documento digital, certificado digital)' => 'erodrigues@crm-rj.gov.br',
                                    '13. Solicitação de Serviços PF' => 'erodrigues@crm-rj.gov.br',
                                    '14. Solicitação de Serviços PJ' => 'erodrigues@crm-rj.gov.br',
                                ),
                            );
                            break;
							
                        

                    default:
                        
                    $regional = null;
                    // $regional = 'BR';
                break;
    };
    return $regional;

};