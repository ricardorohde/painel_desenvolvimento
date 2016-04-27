<?php
$config = array('clientes' => array(array(
                                	'field'=>'nomeCliente',
                                	'label'=>'Nome',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'telefone',
                                	'label'=>'Telefone',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'celular',
                                	'label'=>'celular',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'operadora',
                                	'label'=>'operadora',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'email',
                                	'label'=>'Email',
                                	'rules'=>'required|trim|valid_email|xss_clean'
                                ),
								array(
                                	'field'=>'clientesky',
                                	'label'=>'clientesky',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'usuario_id',
                                	'label'=>'usuario_id',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'status',
                                	'label'=>'status',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'ip_lead',
                                	'label'=>'ip_lead',
                                	'rules'=>'required|trim|xss_clean'
                                ))
				,
                
                'servicos' => array(array(
                                    'field'=>'tecnico_ids',
                                    'label'=>'tecnico_ids',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'produto_ids',
                                    'label'=>'produto_ids',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'quantidadeproduto',
                                    'label'=>'quantidadeproduto',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,

				'avanco' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descricao',
                                    'label'=>'',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'preco',
                                    'label'=>'',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'insercao' => array(array(
                                    'field'=>'notafiscal',
                                    'label'=>'notafiscal',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descricao',
                                    'label'=>'descricao',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'estoque',
                                    'label'=>'estoque',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
				'usuarios' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean'
                                ),
                                array(
                                    'field'=>'senha',
                                    'label'=>'Senha',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'telefone',
                                    'label'=>'Telefone',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'situacao',
                                    'label'=>'Situacao',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,      
                'historico' => array(array(
                                    'field'=>'descricaoHistorico',
                                    'label'=>'descricaoHistorico',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'retorno',
                                    'label'=>'retorno',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'horaRetorno',
                                    'label'=>'horaRetorno',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'clientes_id',
                                    'label'=>'clientes_id',
                                    'rules'=>'required|trim|xss_clean'
                                ))
				,
				'ligou' => array(array(
                                    'field'=>'ligou',
                                    'label'=>'ligou',
                                    'rules'=>'required|trim|xss_clean'                     
                                ))
				,				
				'tecnicos' => array(array(
                                    'field'=>'idskytecnico',
                                    'label'=>'idskytecnico',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'nometecnico',
                                    'label'=>'nometecnico',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'telefonetecnico',
                                    'label'=>'telefonetecnico',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'tecnicoativo',
                                    'label'=>'tecnicoativo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
				,
				
                'fimatendimento' => array(array(
                                    'field'=>'cliente_id',
                                    'label'=>'cliente_id',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'motivo',
                                    'label'=>'motivo',
                                    'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                    'field'=>'pacote',
                                    'label'=>'pacote',
                                    'rules'=>'required|trim|xss_clean'
                                ))
				,
					
                'os' => array(array(
                                    'field'=>'dataInicial',
                                    'label'=>'DataInicial',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'dataFinal',
                                    'label'=>'DataFinal',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'garantia',
                                    'label'=>'Garantia',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descricaoProduto',
                                    'label'=>'DescricaoProduto',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'defeito',
                                    'label'=>'Defeito',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'status',
                                    'label'=>'Status',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'observacoes',
                                    'label'=>'Observacoes',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'clientes_id',
                                    'label'=>'clientes',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'usuarios_id',
                                    'label'=>'usuarios_id',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'laudoTecnico',
                                    'label'=>'Laudo Tecnico',
                                    'rules'=>'trim|xss_clean'
                                ))

                  ,
				'tiposUsuario' => array(array(
                                	'field'=>'nomeTipo',
                                	'label'=>'NomeTipo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'situacao',
                                	'label'=>'Situacao',
                                	'rules'=>'required|trim|xss_clean'
                                ))

                ,
                'receita' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'Descrição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor',
                                    'label'=>'Valor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'vencimento',
                                    'label'=>'Data Vencimento',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                        
                                array(
                                    'field'=>'cliente',
                                    'label'=>'Cliente',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'tipo',
                                    'label'=>'Tipo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'despesa' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'Descrição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor',
                                    'label'=>'Valor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'vencimento',
                                    'label'=>'Data Vencimento',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'fornecedor',
                                    'label'=>'Fornecedor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'tipo',
                                    'label'=>'Tipo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'vendas' => array(array(
                                	'field'=>'nomeCliente',
                                	'label'=>'Nome',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'telefone',
                                	'label'=>'Telefone',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'celular',
                                	'label'=>'celular',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'email',
                                	'label'=>'Email',
                                	'rules'=>'required|trim|valid_email|xss_clean'
                                )),
		);
			   