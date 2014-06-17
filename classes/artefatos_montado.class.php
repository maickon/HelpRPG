<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
class Artefatos_montado{

	private $id;
	private $nome;
	private $descricao_historia;
	private $descriacao_regra;
	
	function __contruct(){
		$this->gerar_artefato();
	}
	
	function getId(){
		return $this->id;
	}
	
	function setID($id){
		$this->id = $id;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function getDescricaoHistoria(){
		return '<strong>'.$this->descricao_historia.'</strong>';
	}
	
	function setDescricaoHistoria($descricaoHistoria){
		$this->descricao_historia = $descricaoHistoria;
	}
	
	function getDescricaoRegra(){
		return $this->descriacao_regra;
	}
	
	function setDescricaoRegra($descricaoRegra){
		$this->descriacao_regra = $descricaoRegra;
	}
	
	function gerar_artefato(){
	
		$escolido = rand(1,56);
		
		switch($escolido){
		
			case 1:
				$this->id = "<strong>".$escolido."</strong>";
				$this->nome = "<strong>Verethragna Blade</strong>";
				
				$this->descricao_historia = "<strong>
												Verethragna Deus Persa da guerra e do triunfo,a cerca de 2.500 em uma batalha contra os humanos,
												resolveu criar essa espada de presente a o único humano que conseguiu o ferir,como prova de sua bravura.
										     </strong>";
											 
				$this->descriacao_regra = "
											Trata-se de uma espada longa (1d8) indestrutivel que não pode ser atingida por nenhum tipo de magia. 
											Qualquer dano causado por ela será crítico sempre que atingir um oponente. Ou seja ela causará sempre dano dobrado. 
											Considera-se um 20 no dado quando atacar com ela.
										  
										  ";
				break;
				
				case 2:
				$this->id = "<strong>".$escolido."</strong>";
				$this->nome = "<strong>
								Anel de Minerva
							   </strong>";
				
				$this->descricao_historia = "<strong>
												Um dia certo ferreiro criou esse anel para presentear Minerva Deusa da sabedoria Greco-romana,
												e como ato de gratidão ela devolveu o anel com sua benção divina,dando o poder de aumentar a Sabedoria 
												daquele que o porta.
										     </strong>";
											 
				$this->descriacao_regra = "
										  	Este anel concede +8 de sabedoria ao usuário.
										  ";
				break;
				
				case 3:
				$this->id = "<strong>".$escolido."</strong>";
				$this->nome = "<strong>
								Senjou blade
							   </strong>";
				
				$this->descricao_historia = "<strong>
												Durante a era de edo, Masamune date pediu a seu ferreiro para criar essa katana sendo 
												feita com propriedades magicas,para ser ultilizada na batalha de senjougahara,
												e até os tempos atuais,ela vem estando em varios campos de batalha sendo passada para os melhores samurais de edo.
										     </strong>";
											 
				$this->descriacao_regra = "
										  	Esta katana +5 possui a habilidade de uma vez por dia causar o dano do laijutso máximo sem precisar rolar os d6.
										  ";
				break;
				
				case 4:
				$this->id = "<strong>".$escolido."</strong>";
				$this->nome = "<strong>
								Armadura de midas
							   </strong>";
				
				$this->descricao_historia = "<strong>
											Essa armadura foi feita a pedido do rei Midas,para conter seu poder magico de trasforma tudo em ouro,
											mais ele percebeu que ela fazia mais do que isso... ela fez ele ser imune a qualquer poder magico,humano ou divino.
											</strong>";
											 
				$this->descriacao_regra = "
										  	A armadura de midas é um camisão de cota de malha que concede ao ser portador imunidade total vinda de qualquer magia, 
											seja arcana ou divina (até 9º circulo). Magias de área também não afetam o portador, 
											a armadura simplesmente anula a magia que entrar na área da armadura(3m).
										  ";
				break;
			
				case 5:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Colar encantador
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Esse colar foi feito pelo poder da Deusa Afrodite,tendo como poder encantar os inimigos e 
												fazerem eles ficarem atordoados por certo tempo.
												</strong>";
												 
					$this->descriacao_regra = "
												Este colar concede o poder de atordoar qualquer pessoa que olhe diretamente o seu portador,
												a vítima de ser bem sucedido em um teste de VONTADE CD 20 para não ficar atordoado por 1d4 de rodadas. 
											  ";
					break;
					
				case 6:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Machado do Espirito Incandecente
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Forjado pelo proprio Hefesto esse marchado tem o poder de ficar incandecente quando seu portador 
												entra em furia na batalha.
												</strong>";
												 
					$this->descriacao_regra = "
												Este machado grande obra prima, liberta seus poderes quando o seu portador entra em uma fúria destrutiva.
												Enquanto o usuário estiver em fúria este machado será +5 flamejante e concederá +4 em força e constituição.
											  ";
					break;
					
				case 7:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Faísca de Zeus
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Durante a batalha dos Deuses do Olimpo contra Tifão,seus poderes cruzados deram origem a varios itens magicos,
												sendo um deles essa lança.
												</strong>";
												 
					$this->descriacao_regra = "
												Trata-se de uma lança longa +4 capaz de disparar um raio que alcança 10m 
												de distância como ataque a distância causando 10d6 de dano.
											  ";
					break;	
					
				case 8:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Bússola de Jasão
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Feito para direcionar o navio argos de Jasão em sua busca pelo velocino de ouro,
												essa bússola têm o poder de mostrar a direção do que o coração de seu portador mais deseja.
												</strong>";
												 
					$this->descriacao_regra = "
												A bússola possui o poder de guiar o seu portador até onde ele deseja ir,
												 basta o portador conhecer sobre o lugar, ou seja ja ter estado la.
											  ";
					break;
					
				case 9:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Machado do Espirito Incandecente
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Forjado pelo proprio Hefesto esse marchado tem o poder de ficar incandecente quando seu portador 
												entra em furia na batalha.
												</strong>";
												 
					$this->descriacao_regra = "
												Este machado grande obra prima, liberta seus poderes quando o seu portador entra em uma fúria destrutiva.
												Enquanto o usuário estiver em fúria este machado será +5 flamejante e concederá +4 em força e constituição.
											  ";
					break;
					
				case 10:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Arco longo dos poderosos
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Esse arco foi criado pelo lider Legolas da tribo dos elfos,a quanto tempo ele foi feito ninguém sabe... 
												só uma coisa é conhecida deste arco... que só um poderoso arqueiro consegue o ultilizar.												</strong>";
												 
					$this->descriacao_regra = "
												Este arco longo só pode ser usado por arqueiros experientes (12º ou mais), uma vez usado por arqueiro
												inesperiente ou por pessoas que não saibam usar o arco, ele simplesmente não funcionará pois sua corda usada para dispara 
												a flecha sumirá. Entretando quando usado por um arqueiro experiente, 
												este arco possuirá a habilidade de dobrar a quantidade de flexas lançadas pelo arco no momento do disparo.
											  ";
					break;
					
				case 11:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Escudo Aegis
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Por décadas esse escudo foi perdido... mais a poucos anos um aventureiro o encontro em meio sua jornada,
												e quando viu o nome  encrustado nele tremeu de medo... pois era o proprio escudo Aegis.		
												</strong>";
												 
					$this->descriacao_regra = "
												Este escudo grande banhado a ouro com uma face de uma medusa no centro, 
												possui a habiliade de transmitir uma sensação de terror que é capaz de paralizar qualquer pessoa que o veja por 1d4 de rodadas.  
											  ";
					break;
					
				case 12:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Espadoa dos três (Creezol)
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Há dois mil anos essa espada foi forjada pelos 3 mais poderosos paladinos,tendo sido feita para manter a ordem no mundo, 
												segundo lendas, uma vez empunhada por um paladino poderoso, o mal se curva diante dela e toda ordem volta ao normal .			
												</strong>";
												 
					$this->descriacao_regra = "
												Esta espada larga obra prima conhecida como (Creezol), quando empunhada por um paladino de nivel 16 ou maior, 
												se torna uma +5 sagrada com mais três habilidades adicionais: 1º caçadora de demônhos.
												<br />
												<strong>Caçadora de domônhos(nova Hablidade):</strong>
													Qualquer demônio diante desta espada não consegue mentir.
													Quando esta espada atinge um demônio ela simplemente rompe a existencia da criatura causando exatamente o dano suficiente para matar a criatura.
												<br />
												<strong>2º Ressureição verdadeira</strong>
													3 vezes por dia, a espada pode lançar em seu portador após a sua morte.
												<br />
												<strong>3º Compuração</strong>
													Qualquer pessoa de tendencia maligna que empunhar esta espada, sofrerá 3d6 de pontos de dano e seu verdadeiro eu cairá num poço profundo de esquecimento permanentemente(nenhuma magia é capaz de trazer a memória de volta) esquecendo quem foi,
													 o que sentia e sua própria tendencia(ou seja a espada vai lhe dar uma chance de ser bom). 

											  ";
					break;
					
				case 13:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Bracelete de Osiris
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Em nome de Osiris o faraó ordenou a seus cervos a fazerem esses braceletes para o Deus...o 
												único problema foi que o faraó ficou tão encantado pelo poder dos braceletes que os tomou para ele mesmo.
												</strong>";
												 
					$this->descriacao_regra = "
												Estes incriveis braceletes de ouro encrustados com joias preciosas aumentam sua beleza e bem estar, 
												lhe fazendo se sentir tão bem que a sensação do portador é que o bracelete faz parte de seu próprio corpo.
												 Em termos de regras ele concede +6 em carisma.
											  ";
					break;
					
				case 14:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Machado do Espirito Incandecente
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Forjado pelo proprio Hefesto esse marchado tem o poder de ficar incandecente quando seu portador 
												entra em furia na batalha.
												</strong>";
												 
					$this->descriacao_regra = "
												Este machado grande obra prima, liberta seus poderes quando o seu portador entra em uma fúria destrutiva.
												Enquanto o usuário estiver em fúria este machado será +5 flamejante e concederá +4 em força e constituição.
											  ";
					break;
					
				case 15:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Excalibur
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Em meio da era das trevas aproximadamente 400 anos d.c. Merlin forjou essa espada para o rei Arthur,a espada se tornou simbolo do trono... 
												mais nos tempos atuais seu paradeiro era desconhecido...até agora.
												</strong>";
												 
					$this->descriacao_regra = "
											Trata-se de uma espada +5 indestrutivel.
											
											  ";
					break;
					
				case 16:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Machado do Espirito Incandecente
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Forjado pelo proprio Hefesto esse marchado tem o poder de ficar incandecente quando seu portador 
												entra em furia na batalha.
												</strong>";
												 
					$this->descriacao_regra = "
												Este machado grande obra prima, liberta seus poderes quando o seu portador entra em uma fúria destrutiva.
												Enquanto o usuário estiver em fúria este machado será +5 flamejante e concederá +4 em força e constituição.
											  ";
					break;
					
				case 17:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Tomo de Merlin
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Merlin antes de sumir no mundo deixou esse livro que contém os segredos de suas magias... mais como sempre, ele de usou suas brincadeiras
												e selou as magias,para que o mago que o encontrasse só podesse ter acesso as magias conforme a capacidade de seu poder.
												</strong>";
												 
					$this->descriacao_regra = "
												 Este livro poderoso só tem seu efeito despertado quando lido por um mago, 
												para qualquer outra pessoa que não seja um mago, esse livro não passará de um item mundano. 
												Quando lido, este livro disperta em seu leitor o conhecimento de todas as magias até o circulo atual em que ele pode conjurar, 
												além disso sua capacidade de magias conjuradas por dia aumentam em +1 para todos os circulos que ele conhece. 
												Uma vez lido o livro perde o seu poder e se torna um item mundano.											  ";
					break;
					
				case 18:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Machado do Espirito Incandecente
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Forjado pelo proprio Hefesto esse marchado tem o poder de ficar incandecente quando seu portador 
												entra em furia na batalha.
												</strong>";
												 
					$this->descriacao_regra = "
												Este livro poderoso só tem seu efeito despertado quando lido por um mago, 
												para qualquer outra pessoa que não seja um mago, esse livro não passará de um item mundano. 
												Quando lido, este livro disperta em seu leitor o conhecimento de todas as magias até o circulo atual em que ele pode conjurar, 
												além disso sua capacidade de magias conjuradas por dia aumentam em +1 para todos os circulos que ele conhece. 
												Uma vez lido o livro perde o seu poder e se torna um item mundano.
											  ";
					break;
					
				case 19:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Elmo Espartando de Batalha
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Feito em esparta esse elmo tem como caracteristica,
												proporcionar ao usuario melhor visão do campo de batalha ao mesmo tempo que o protege.
												</strong>";
												 
					$this->descriacao_regra = "
												Este elmo espartano elém de conceder +2 na CA de bônus mágico, 
												permite ao seu portador sucesso em qualquer teste de observar somente quando ele estiver em combate.
											  ";
					break;
					
				case 20:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									A espada de Hector
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Por que fazes armas...? fizeram essa pergunta a um ferreiro... e ele respondeu...
												- Pela mesma razão que um mago estuda suas magias. Não se trata de fazer bem ou mal, 
												mas sim a arte e o talento na criação de sua obra de arte. Anos mais tarde ele mostrou sua 
												obra prima... essa bela espada cuja beleza e brilho era tanta, que palavras não precisaram 
												ser ditas. Foi presenteada ao rei Hector que derrotou seus inimigo na batalha dos 1000 dias.

												</strong>";
												 
					$this->descriacao_regra = "
												A espada de Hector como hoje em dia é conhecida, 
												trata-se de uma espada longa +3 eneria brilhante que ao ser usada emana uma forte luz que reluz por até 10m. 
											  ";
					break;
				
				case 21:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Dragão hate
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Feita das escamas de um dragão essa armadura se tornou imune a magia de dragões... 
												e ela se tornou o escudo preferido dos caçadores de dragões.

												</strong>";
												 
					$this->descriacao_regra = "
												Muito conhecida entre os caçadores de dragões, essa armadura vem sido procurada por muitos deles ha séculos. 
												Trata-se de uma armadura de batalha mágica que concede ao seu usuário +6 de bônus na CA além de imunidade total a magias de dragões.  
											  ";
					break;
				
				
				case 22:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Os cristais de Iris
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Os cristais de Iris foram dados de presente aos humanos pela Deusa para facilitar a 
												vida dos aventureiros,quando destruidos esses cristais enviam o 
												portador para o lugar desejado por ele.

												</strong>";
												 
					$this->descriacao_regra = "
												Trata-se de cristais mágicos que estão espalhados por todo o mundo, esses cristais tem a habiliade de 
												teleportar o seu portador para o local que ele deseja quando o cristal for destruido pelo seu portador. 
											  ";
					break;
				
				
				case 23:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "<strong>
									Sengoku Basara 
								   </strong>";
					
					$this->descricao_historia = "<strong>
												Feito em meio a era sengoku essa murasame tem grande poder destrutivo... que foi comprovado em muitas batalhas.
												</strong>";
												 
					$this->descriacao_regra = "
												Essa murasame trata-se de uma espada longa +5 sanguinária maior, seu poder de destruição é tão efetivo que basta acertar um único individuo que ele sangrará até a morte, sendo assim o seu portador em uma guerra não precisa lutar com seu inimigo até a morte, basta ecerta-lo apenas uma vez e partir para outro.
												Em termos de regra (sanguenária maior) é uma habilidade que causa um dano fixo toda rodada em uma vítima atingida pela arma. Esse dano é equivalente ao bônus mágico da arma. O dano só pode ser estancado com alguma cura.
 
											  ";
					break;
				
				case 24:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Espada larga +2 da imortalidade profana";
					
					$this->descricao_historia = "Feita em contradição a espada do Deus Eromm da Benevolência, esta arma tem propósitos malignos. Esta arma também foi utilizada na guerra de kyrow nas montanhas do abismo, o seu paradeiro tembém ficou desconhecido. ";
												 
					$this->descriacao_regra = "Toda vez que ela causa dano a um ser de tendencia boa, você cura os seus Pvs com o mesmo dano causado.
dano 2d6";
					break;
				
				case 25:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Espada larga +2 da imortalidade divina";
					
					$this->descricao_historia = "Esta espada foi forjada por um Deus menor chamado Eromm da Benevolência, após a guerra de kyrow nas montanhas do abismo, o paradeiro desta arma ficou desconhecido.";
												 
					$this->descriacao_regra = "Toda vez que ela causa dano a um ser de tendencia maligna, você cura os seus Pvs com o mesmo dano causado.
Dano 2d6";
					break;
					
					case 26:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Espada Semehada";
					
					$this->descricao_historia = "Esta espada foi criada a partir da fundição de diversos outros cacos de espadas quebradas em batalha. Diziam que 
quando fosse empunhada, sua lâmina representaria todas as armas destroidas em combate. Seu primeiro dono foi Solivan,
um nobre guerreiro que foi lider na gurras das berbateiras.";
												 
					$this->descriacao_regra = "Em termos de regra ela é uma espada +2 toque da ruína.
Habilidade:<b>[toque da ruína]</b> Três vezes ao dia esta espada causa um dano adicional de +10d6, caso reduza os pntos de vida do alvo a 0,
o alvo é desintegrado.";
					break;
					
					case 27:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Faixas De Honorado Zen";
					
					$this->descricao_historia = "
Honorado Zen foi um monge que atingiu a auto perfeição com apenas o treinamento da mente, segundo sua doutrina, sua mente é 		capaz de instruir o seu corpo a uma tamanha perfeição sem nunca ter tido algum treino fisico. Sua doutrina foi muito
questionada e ridicularizada pelas pessoas da época. Entretando Honorado provou a eficiência de seu treino vencendo o torneio 		dos punhos épicos. Antes de morrer Honorado zen entregou suas faixas de punho ou seu melhor discipulo como simbulo de respeito 	e honra. Após sua morte o seu discipulo sentiu a presença de Honorado Zen em suas feixas de punho, e de alguma forma estranha 
ele sentia paz, sua paciência, seu espirito e sua força.";
												 
					$this->descriacao_regra = "As faixas quando utilizadas concedem ao usuário +6 na CA, Bônus de ataque e pericia concentração.";
					break;
					
					case 28:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Livro de Roob";
					
					$this->descricao_historia = "Roob foi um mago que passou metade de sua vida tentando descobrir a formula de imortalidade, após tantos experimentos ele descobriu
que apenas erá possível substituir uma essência da vida por outra. Em outras palavras erá preciso armazenar a essência vital de uma pessoa em algum recipiente para depois usa-lo.";
												 
					$this->descriacao_regra = "Este livro tem a capacidade de comportar a essência da vida de apenas uma pessoa. Para isso é precisso de um corpo vivo de um pessoa inteligente para ser sacrificada, no sacrifício deve ser proferidas as palavras mágicas que estão escritas em elfico no livro. Uma fez lido, a essência vital da vítima é transportada para o livro e a vítima morre. Enquanto o livro estiver na posse do seu dono, ele trará o seu dono a vida em caso de morte, transportando a essência vital do livro para o corpo do dono do livro.";
					break;
					
					case 29:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Martelo do grito de guerra +1";
					
					$this->descricao_historia = "Este martelo foi um presente dado a Layonel como prova de bravura em suas batalha.";
												 
					$this->descriacao_regra = "Quando empunhado por uma anão, até três vezes ao dia você pode berrar uma das frases descrita no cabo do martelo e ganhar o 	seguinte benefício durante o combate. 
+4 no bônus de ataque.
+2 no dano com a martelo
dano 1d10";
					break;
					
					case 30:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Profana discórdia +4";
					
					$this->descricao_historia = "Forjada no limbo pelo feiticeiro maligno Belbazar, esta arma consome a essência de que a carrega consigo, sua tendencia se torna maligna com alinhamento leal.";
												 
					$this->descriacao_regra = "As pessoas ao seu redor (raio 9m) devem obter sucesso num teste de vont CD 20 ou serão consumidos em discódia acabando se desentendendo fácilmente com qualquer outra pessoa e gerando confusões de briga até a morte.
As plantas que estão num raio de até 3m do portador da espada morram com sua presença, criaturas comuns com até 4dv precisam fazer um teste de fort CD 14 para não morrerem.";
					break;
					
					case 31:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Sagrada justiceira";
					
					$this->descricao_historia = "A sagrada justiceira foi uma arma forjada para derrotar o maléfico Demon Rhust que causava caos e destruição em Benália, porém segunda a lenda, para que seus poderes funcionassem, somente um coração puro pode despertar o seu poder.";
												 
					$this->descriacao_regra = "A sagrada justiceira é uma espada curta +2. Porém quando utilizado por um paladino, dobra o bônus e dano concedidos pela 		habilidade de destruir o mal.
dano 1d6";
					break;
					
					case 32:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Shuriken da lua prateada +2";
					
					$this->descricao_historia = "Estas shurikens são utilizadas pelos ninjas do clã da lua prateada.";
												 
					$this->descriacao_regra = "Quando disparada contra alguém, essa shuriken ignora no bônus de destreza na CA da vítima pela ofuscação de seu incrivel 	brilho(criaturas que nao enxergam ou não precisam da visão são imunes a este efeito).";
					break;
					
					case 33:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "shuriken decaptadora +5 Volpal";
					
					$this->descricao_historia = "Muito utilizada pelos ninjas de elite de Nobako Hokai, estas shurikens tem a capacidade de aumentar o seu tamanho quando está 	prestes a acertar a vítima. ";
												 
					$this->descriacao_regra = "Quando lançada a vítima leva uma penalidade de -3 na CA para esquivar-se desta shuriken.(Criaturas que não podem ser 	surpreendidas são imune a esta penalidade).
Margem de decisivo 19-20";
					break;
						
					case 34:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Flauta de Hereborn";
					
					$this->descricao_historia = "Segundo lendas, o som de sua flauta era capaz de encantar até mesmo os deuses. Todos ao redor ficavam fascinados pela melodia hamoniosa tocada pela misterosa flauta.";
												 
					$this->descriacao_regra = "Quando esta flauta é tocada, todos num raio de 18m devem obter sucesso nem teste de fortitude CD 20 ou estarão paralizados enquanto a melodia estiver tocando.";
					break;
					
					case 35:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Escudo de Morpheu +2";
					
					$this->descricao_historia = "Este escudo pequeno de metal foi encantado po Belmias, um mago poderoso amigo de Morpheu. Segundo a magia encantada no escudo tornaria Morpheu imbatival em seus combates.";
												 
					$this->descriacao_regra = "Este escudo concede um bônus total de +3 na CA e possui a habilidade de três vezes por dia lançar sobre o seu portador uma magia criada exclisivamente por Belmias. Esta magia concede +6 de bônus de deflexão na CA por 1h e pode ser lançada como uma ação livre apenas deve-se proferir as palavras mágicas.";
					break;
					
					case 36:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Elixir da Força";
					
					$this->descricao_historia = "Este elixir foi feito por Drupal, um mago da guerra que com intuito de aumentar a performace de seus soldados criou este elixir para torna-los ainda melhores.";
												 
					$this->descriacao_regra = "Este elixir concede um aumento de +1d6 na Força permanentemente. A ingestão desta substância acarreta num risco de perder a vida ao toma-la. Ao ingerir, deve-se ser bem sucedido num teste de fortitude CD 15, um fracasso indica morte instantânea e um sucesso aumento na força. Para cada nova ingestão a CD do teste de fortitude aumenta em +7.";
					break;
					
					case 37:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Elixir da Destreza";
					
					$this->descricao_historia = "Este elixir foi feito por Drupal, um mago da guerra que com intuito de aumentar a performace de seus soldados criou este elixir para torna-los ainda melhores.";
												 
					$this->descriacao_regra = "Este elixir concede um aumento de +1d6 na Destreza permanentemente. A ingestão desta substância acarreta num risco de perder a vida ao toma-la. Ao ingerir, deve-se ser bem sucedido num teste de fortitude CD 15, um fracasso indica morte instantânea e um sucesso aumento na destreza. Para cada nova ingestão a CD do teste de fortitude aumenta em +7.";
					break;
					
					case 38:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Elixir da Saúde";
					
					$this->descricao_historia = "Este elixir foi feito por Drupal, um mago da guerra que com intuito de aumentar a performace de seus soldados criou este elixir para torna-los ainda melhores.";
												 
					$this->descriacao_regra = "Este elixir concede um aumento de +1d6 na Constituição permanentemente. A ingestão desta substância acarreta num risco de perder a vida ao toma-la. Ao ingerir, deve-se ser bem sucedido num teste de fortitude CD 15, um fracasso indica morte instantânea e um sucesso aumento na constituição. Para cada nova ingestão a CD do teste de fortitude aumenta em +7.";
					break;
					
					case 39:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Ametista Vortox";
					
					$this->descricao_historia = "Criada pelo mago Vortox esta ametista tem o poder de aumentar a capacidade de intelecto de seu usuário. ";
												 
					$this->descriacao_regra = "Esta pedra preciosa deve ser cravada em alguma arma de qualquer natureza. uma vez crevejada, o portador receberá +4 na Inteligência.";
					break;
					
					case 40:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Amuleto do Titan da Força";
					
					$this->descricao_historia = "Segundo lendas, neste amuleto se encontra aprisionado a força do titan mais poderoso da história. Dizem que aque que porta o amuleto, nunca mais se curvará diante da força de terceiros.";
												 
					$this->descriacao_regra = "Este amuleto concede ao usuário um bônus de +25 na sua Força.";
					break;
					
					case 41:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cajado Primal";
					
					$this->descricao_historia = "Feito pelo próprio Sacerdote é um cajado usado pelos aprendizes de magia. Um cajado cuja a habilidade é auxiliar o jovem mago e fortaler todas suas magias";
												 
					$this->descriacao_regra = "Aumenta +2 na Int do personagem que o usa";
					break;
					
					case 42:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Anel de Nut";
					
					$this->descricao_historia = "Esses Aneis foram forjados pela deusa do céu Nut como presente aos humanos que provaram sua bravura";
												 
					$this->descriacao_regra = "Aumenta +2 em todas suas Habilidades naturais.(Inteligência, Sabedoria,Força, Destreza, Constituição,Carisma).";
					break;
					
					case 43:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cristais do sub mundo";
					
					$this->descricao_historia = "Criado no submundo, esses cristais ampliam a capacidade do ser que os monipular.";
												 
					$this->descriacao_regra = "Cada cristal da +2 no Ca do personagem que o possui, e o personagem tem um ganho extra de 2000 de Xp em todas as aventuras.";
					break;
					
					case 44:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho da Guerra";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "+3 de Des e +3 de For permanentemente. Após ser lido o pergaminho desaparece.";
					break;
					
					case 45:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho da Magia";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "+3 de Int e +3 de Con. Após ser lido o pergaminho desaparece.";
					break;
					case 46:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho de Salomão";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "+3 de Sab e +3 de Car. Após ser lido o pergaminho desaparece.";
					break;
					case 47:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho do Conhecimento";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "+1 Talento adicional. Após ser lido o pergaminho desaparece.";
					break;
					
					case 48:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho da Experiência";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "Aumenta +5.000 XP no seu personagem. Após ser lido o pergaminho desaparece.";
					break;
					
					case 49:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho do Desenvolvimento";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "Aumenta +1 Nivel no seu personagem. Após ser lido o pergaminho desaparece.";
					break;
					
					case 50:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho da Ivunerabilidade";
					
					$this->descricao_historia = "Artefato com histórico desconhecido.";
												 
					$this->descriacao_regra = "O personagem adiquire RD 5/- permanentemente. Após ser lido o pergaminho desaparece.";
					break;
					
					case 51:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cristal do Fogo";
					
					$this->descricao_historia = "Os cristais foram criados para serem equipados em alguma arma diretamente, não pode  equipar mais de 3 cristais em uma única arma. Se isso acontecer seus efeitos se anulam. Uma vez que equipar em uma arma não pode ser retirado.";
												 
					$this->descriacao_regra = "Aumenta +6 de dano na arma equipada. Esse dano conta como dano de Fogo.";
					break;
					
					case 52:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cristal da Água";
					
					$this->descricao_historia = "Os cristais foram criados para serem equipados em alguma arma diretamente, não pode  equipar mais de 3 cristais em uma única arma. Se isso acontecer seus efeitos se anulam. Uma vez que equipar em uma arma não pode ser retirado.";
												 
					$this->descriacao_regra = "Todo ataque que o personagem der, se estiver atacando com a arma que possui esse cristal, ele recupera +2 de Pv. Mesmo que o ataque não acerte ele recupera o Pv.";
					break;
					
					case 53:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cristal do Vento";
					
					$this->descricao_historia = "Os cristais foram criados para serem equipados em alguma arma diretamente, não pode  equipar mais de 3 cristais em uma única arma. Se isso acontecer seus efeitos se anulam. Uma vez que equipar em uma arma não pode ser retirado.";
												 
					$this->descriacao_regra = "O personagem é mais rapido com a ajuda do vento. Aumenta o deslocamento em +10 metros enquanto estiver portando a arma com esse cristal. Ex: deslocamento de um Humano= 9 metros, portando uma arma com esse cristal= 19 metros. ";
					break;
					
					case 54:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cristal da Terra";
					
					$this->descricao_historia = "Os cristais foram criados para serem equipados em alguma arma diretamente, não pode  equipar mais de 3 cristais em uma única arma. Se isso acontecer seus efeitos se anulam. Uma vez que equipar em uma arma não pode ser retirado.";
												 
					$this->descriacao_regra = "Esse cristal concede +2 em todas as pericias que o personagem têm enquanto o personagem estiver segurando a arma que este cristal está equipado.";
					break;
					
					case 55:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Cristal do Trovão";
					
					$this->descricao_historia = "Esse cristal concede +2 em todas as pericias que o personagem têm enquanto o personagem estiver segurando a arma que este cristal está equipado.";
												 
					$this->descriacao_regra = "O cristal concede um ataque adicional com a arma que ele está equipado. Esse cristal só pode ser equipado um por arma.";
					break;
					
					case 56:
					$this->id = "<strong>".$escolido."</strong>";
					$this->nome = "Pergaminho da Morte";
					
					$this->descricao_historia = "Artefato desconhecido.";
												 
					$this->descriacao_regra = "Se o personagem que portar esse pergaminho morrer, ele renascerá na mesma hora com 1/2 de seu Pv. O pergaminho logo depois é destruido. Um personagem só pode portar um pergaminho desse por vez.";
					break;
			}
		
		}
	
}

?>