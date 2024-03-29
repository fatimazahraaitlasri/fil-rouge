<?php

use Jenssegers\Blade\Blade;


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

// add unique stylesheets to the page
        return "<?php
        \$__env->stylesMap ??= [];
        if(!isset(\$__env->stylesMap[$file])):
           \$__env->stylesMap[$file] = true;
            \$__env->startPush('styles');
        ?>
            <link rel='stylesheet' href='css/<?=$file;?>.css'>
        <?php
            \$__env->stopPush(); 
        endif; 
        ?>
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
 * vérifier si l'utilisateur est connecté ou non
 * @return [type]
 */
function isLoggedIn(): bool
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
function redirect(string $path): bool
{
    $path = trim($path, "/");
    header("location: /".PROJECT_NAME."/$path");

    return true;
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
    if (count($_POST) > 0) {
        return $_POST;
    }
    $jsonData = file_get_contents('php://input');

    return json_decode($jsonData);
}

function query($key)
{
    return $_GET[$key] ?? null;
}
