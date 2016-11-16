<?php

use Phinx\Seed\AbstractSeed;

class AnswerSeed extends AbstractSeed
{
	/**
	 * Run Method.
	 *
	 * Write your database seeder using this method.
	 *
	 * More information on writing seeders is available here:
	 * http://docs.phinx.org/en/latest/seeding.html
	 */
	public function run()
	{
		$data = array(
				array(
					'question_id' => 1,
					'identity_survey_id' => 1,
					'text' => 'Acorda cedo e come frutas cortadas metodicamente.',
				),
				array(
					'question_id' => 1,
					'identity_survey_id' => 2,
					'text' => 'Sai da cama com o despertador e se prepara para a batalha da semana.',
				),
				array(
					'question_id' => 1,
					'identity_survey_id' => 3,
					'text' => 'Só consegue lembrar do seu nome depois do café.',
				),
				array(
					'question_id' => 1,
					'identity_survey_id' => 4,
					'text' => 'Levanta e faz café pra todos da casa.',
				),
				array(
					'question_id' => 1,
					'identity_survey_id' => 5,
					'text' => 'Passa o café e conserta um erro no HTML.',
				),
				array(
					'question_id' => 2,
					'identity_survey_id' => 1,
					'text' => 'Ela vai atrapalhar seu horário. Oculte o corpo.',
				),
				array(
					'question_id' => 2,
					'identity_survey_id' => 2,
					'text' => 'Levanta a senhora e jura protegê­-la com sua vida.',
				),
				array(
					'question_id' => 2,
					'identity_survey_id' => 3,
					'text' => 'Ajuda­-a, mas questiona sua real identidade.',
				),
				array(
					'question_id' => 2,
					'identity_survey_id' => 4,
					'text' => 'Oferece para caminharem juntos até um destino em comum.',
				),
				array(
					'question_id' => 2,
					'identity_survey_id' => 5,
					'text' => 'Testa se ela roda bem no Firefox. Não roda.',
				),
				array(
					'question_id' => 3,
					'identity_survey_id' => 1,
					'text' => 'Convence parte das pessoas a esperarem o próximo.',
				),
				array(
					'question_id' => 3,
					'identity_survey_id' => 2,
					'text' => 'Ignora as pessoas no elevador e entra de qualquer forma.',
				),
				array(
					'question_id' => 3,
					'identity_survey_id' => 3,
					'text' => 'Você questiona a realidade, as coisas e tudo mais. Sobe de escada.',
				),
				array(
					'question_id' => 3,
					'identity_survey_id' => 4,
					'text' => 'Com uma leve intimidação passivo­agressiva, encontra um lugar no elevador.',
				),
				array(
					'question_id' => 3,
					'identity_survey_id' => 5,
					'text' => 'Cria um app que mostra a lotação do elevador. Vende o app e fica milionário.',
				),
				array(
					'question_id' => 4,
					'identity_survey_id' => 1,
					'text' => 'Fala sobre a política, eleições, como tudo é um absurdo.',
				),
				array(
					'question_id' => 4,
					'identity_survey_id' => 2,
					'text' => 'Larga uma frase polêmica e vê uma pequena guerra se formar.',
				),
				array(
					'question_id' => 4,
					'identity_survey_id' => 3,
					'text' => 'Puxa um assunto e te lembram que já foi discutido semana passada.',
				),
				array(
					'question_id' => 4,
					'identity_survey_id' => 4,
					'text' => 'Sugere que os colegas trabalhem na ideia de um novo projeto.',
				),
				array(
					'question_id' => 4,
					'identity_survey_id' => 5,
					'text' => 'Desabafa sobre como odeia PHP. Todo mundo na sala adora PHP.',
				),
				array(
					'question_id' => 5,
					'identity_survey_id' => 1,
					'text' => 'Vou chamar aqui o meu Uber.',
				),
				array(
					'question_id' => 5,
					'identity_survey_id' => 2,
					'text' => 'Pegarei o bus junto com o resto do povo.',
				),
				array(
					'question_id' => 5,
					'identity_survey_id' => 3,
					'text' => 'No ponto de ônibus mais uma vez, espero não errar a linha de novo.',
				),
				array(
					'question_id' => 5,
					'identity_survey_id' => 4,
					'text' => 'Vou de carro, mas ofereço uma carona para os colegas.',
				),
				array(
					'question_id' => 5,
					'identity_survey_id' => 5,
					'text' => 'Acho que descobri uma forma de fazer aquela senhora rodar no Firefox.',
				)
			);

		$answer = $this->table('answer');
		$answer->insert($data)
			->save();
	}
}
