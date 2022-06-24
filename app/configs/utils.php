<?php

use Jenssegers\Blade\Blade;

/**
 * retour fichier view  (method ancienne)
 * @param  string  $path  chemin du fichier view après /resources/views
 * @param  array  $data  tableau à décompresser dans view(html)
 */
function oldView($path, $data = [])
{

    extract($data);
    $path = ltrim($path, "/");
    include dirname(__DIR__)."/resources/views/$path.php";
}

/**
 * retour fichier view  (method nouveau)
 * @param  string  $path  chemin du fichier view après /resources/views
 * @param  array  $data  tableau à décompresser dans view(html)
 */
function view(string $path, array $data = []): bool
{
    $views = dirname(__DIR__)."/resources/views";
    $cache = dirname(__DIR__)."/cache/views";

    $blade = new Blade($views, $cache);

    $blade->directive("styles", function ($file) {
        $file = trim($file, "/");

        return "<?php \$__env->startPush('styles'); ?>
        <link rel='stylesheet' href='css/<?=$file;?>.css'>
        <?php \$__env->stopPush(); ?>
    ";
    });

    $blade->directive("scripts", function ($file) {
        $file = ltrim($file, "/");

        return "<?php \$__env->startPush('scripts'); ?>
        <script src='js/<?=$file;?>.js'></script>
        <?php \$__env->stopPush(); ?>";
    });


    echo $blade->render($path, $data);

    return true;
}

function json($data = []): bool
{
    header("Content-Type: application/json");
    echo json_encode($data);

    return true;
}


function component($path, $data = [])
{
    view("/components/$path", $data);
}


/**
 * afficher clairement les données et arrêter l'exécution
 * @param  mixed  ...$data
 *
 * @return [type]
 */
function dd(...$data)
{
    dump(...$data);
    die();
}


/**
 * vérifier si la requête entrante est en méthode POST
 */
function isPostRequest()
{
    return $_SERVER["REQUEST_METHOD"] == "POST";
}


/**
 * vérifier si le tableau a des champs obligatoires
 * @param  array  $requiredFields  champs obligatoires
 * @param  array  $data  tableau associatif de données
 *
 * @return bool
 */
function verify($requiredFields, $data): bool
{
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            return false;
        }
    }

    return true;
}


/**
 * convertir les slashs (/) en backslashes (\)
 * @param  string  $path
 *
 * @return [type]
 */
function normalizePath($path)
{

    return str_replace("/", "\\", $path);
}


/**
 * vérifier si l'utilisateur est connecté ou non
 * @return [type]
 */
function isLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    return isset($_SESSION["user"]) && !empty($_SESSION["user"]);
}


function logout()
{
    isLoggedIn();
    session_destroy();
}

/**
 * afficher le chemin actuel
 * @return mixed
 */
function currentRoute()
{
    return str_replace("/".PROJECT_NAME, "", $_SERVER["REQUEST_URI"]);
}

// /**
//  * obtenir le rôle de l'utilisateur actuel
//  * @return [type]
//  */
function currentUserRole()
{
    if (!isLoggedIn()) {
        return null;
    }

    return $_SESSION["user"]["role"];
}


/**
 * créer une session pour user
 */
function createUserSession($user): void
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION["user"] = $user;
}


/**
 * redirect vers un chemin spécifié
 * @param  string  $path  chemin aprés /{PROJECT_NAME}/
 *
 * @return [type]
 */
function redirect(string $path): void
{
    $path = trim($path, "/");
    header("location: /".PROJECT_NAME."/$path");
}


/**
 * générer une chaîne aléatoire avec une longueur choisie
 * @param  int  $length
 *
 * @return [type]
 */
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}


/**
 * créez un lien après /{PROJECT_NAME}/
 * @param  mixed  $path
 *
 * @return [type]
 */
function createLink(mixed $path): string
{
    $path = trim($path, "/");

    return "/".PROJECT_NAME."/$path";
}


function asset($path)
{
    return $path;
}

function isowner(): bool
{
    return currentUserRole() === OWNER;
}

function isGetRequest(): bool
{
    return $_SERVER["REQUEST_METHOD"] === "GET";
}


/**
 * recevoir les données de la requête soit par formulaire soit par format json
 * @return array
 */
function getBody(): array
{
    if (count($_POST)) {
        return $_POST;
    }
    $jsonData = file_get_contents('php://input');

    return json_decode($jsonData);
}

function query($key)
{
    return $_GET[$key] ?? null;
}
