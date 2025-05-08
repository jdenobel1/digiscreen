<?php

$env = '../.env';
if (isset($_SESSION['domainesAutorises']) || file_exists($env)) {
	if (isset($_SESSION['domainesAutorises']) && $_SESSION['domainesAutorises'] !== '') {
		$domainesAutorises = $_SESSION['domainesAutorises'];
	} else if (file_exists($env)) {
		$donneesEnv = explode("\n", file_get_contents($env));
		foreach ($donneesEnv as $ligne) {
			preg_match('/([^#]+)\=(.*)/', $ligne, $matches);
			if (isset($matches[2])) {
				putenv(trim($ligne));
			}
		}
		$domainesAutorises = getenv('AUTHORIZED_DOMAINS');
		$_SESSION['domainesAutorises'] = $domainesAutorises;
	}
	if ($domainesAutorises === '*') {
        $origine = $domainesAutorises;
    } else {
        $domainesAutorises = explode(',', $domainesAutorises);
        $origine = $_SERVER['SERVER_NAME'];
    }
	if ($origine === '*' || in_array($origine, $domainesAutorises, true)) {
		header('Access-Control-Allow-Origin: $origine');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Max-Age: 1000');
		header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
	} else {
		header('Location: ../');
		exit();
	}
} else {
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
}

if (!empty($_POST['dgs'])) {
	echo recuperer_donnees($_POST['dgs']);
} else {
	echo '';
}

function recuperer_donnees ($url) {
	$donnees = charger($url);
    return $donnees;
}

function charger ($url) {
    if (function_exists('curl_version')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
        $content = curl_exec($ch);
        curl_close($ch);
        unset($ch);
    } else {
        $context = array ('http' => array ('user_agent' => 'Mozilla/5.0'));
        $context = stream_context_create($context);
        if (!function_exists('file_get_contents')) {
            $fh = fopen($url, 'r', FALSE, $context);
            $content = '';
            while (!feof($fh)) {
                $content .= fread($fh, 128);
            }
            fclose($fh);
        } else {
            $content = file_get_contents($url, NULL, $context);
        }
    }
    return $content;
}
