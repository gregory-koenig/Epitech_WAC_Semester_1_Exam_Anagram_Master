<?php
/*
**	Gestion des erreurs
*/
function errors(&$s1, &$nb)
{
	if (!isset($s1))
	{
		throw new Exception('Veuillez rentrer un mot en premier paramètre '
			. 's\'il vous plait.');
	}
	if ($nb == '0')
	{
		throw new Exception('Veuillez rentrer un nombre correct en deuxième '
			. 'paramètre s\'il vous plait.');
	}
	elseif ($nb >= strlen($s1))
	{
		throw new Exception('Veuillez rentrer un nombre inférieur à la taille '
			 . 'du mot en deuxième paramètre s\'il vous plait.');
	}
}

/*
**	Parcourt le dictionnaire et affiche les anagrammes
*/
function dictionnary($path, &$s1)
{
	$handle = fopen($path, 'r+');
	if ($handle)
	{
		while (($buffer = fgets($handle)) !== false)
		{
			$buffer_len = strlen($buffer);
			$s1_len = strlen($s1);
			if (($buffer_len - 1) == $s1_len)
			{
				static $count = 0;
				echo $buffer;
				$count++;
			}
		}
		echo "\nNombre total d'anagrammes trouvés : $count\n";
		fclose($handle);
	}
}

/*
** Cherche les anagrammes imparfaits
*/
function imperfect_anagram(&$s1, &$nb) {

}

/*
**	Ajoute un mot à la fin du dictionnaire
*/
function add_word($path, &$s1){
	$handle = fopen($path, 'a+');
}

/*
** Lance les fonctions ci-dessus et calcule le temps d'exécution du script
*/
function anagram(&$s1 = null, &$nb = null)
{
	try
	{
		$time_start = microtime(true);
		errors($s1, $nb);
		$path = '../../../Documents/Modules/Colles/Colle 1/Dictionnaire.txt';
		dictionnary($path, $s1, $nb);
		//add_word($path, $s1);
		$time_end = microtime(true);
		$time = $time_end - $time_start;
		$time = round($time, 2);
		echo "\nTemps d'exécution : $time s\n\n";
	}

	catch (Exception $e)
	{
		echo $e->getMessage();
	}
}

anagram($argv[1], $argv[2]);