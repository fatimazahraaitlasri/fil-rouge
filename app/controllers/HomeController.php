<?php

class HomeController
{

    private User $userModel;
    private Property $propertyModel;

    public function __construct()
    {
        $this->userModel = new User;
        $this->propertyModel = new Property;
        Middleware::assign($this, ["account", "profile"], ["auth"]);

    }

    public function index()
    {

        $apartments = $this->propertyModel->fetchAll("where type = :type limit 6", [
            "type" => "apartment",
        ]);
        $hotels = $this->propertyModel->fetchAll("where type = :type limit 6", [
            "type" => "hotel",
        ]);

        return view("home", [
            "apartments" => $apartments,
            "hotels" => $hotels,
        ]);
    }

    public function login()
    {
        if (isPostRequest()) {
            $data = getBody();
            $user = $this->userModel->fetchByField("email", $data["email"]);
            if ($user && password_verify($data["password"], $user->password)) {
                Auth::login($user);

                return redirect("/");
            }

            return view("login", [
                "error" => "Wrong password or email",
            ]);
        }

        return view("login");
    }

    public function register()
    {
//         handle post request that has name|email|password|role
        if (isPostRequest()) {
            $data = getBody();
            if (verify(["name", "email", "password", "role"], $data)) {
                if (strtolower($data["role"]) == ROLE_ADMIN) {
//                     prevent user from creating an admin account
                    $data["role"] = ROLE_GUEST;
                }
                $userData = [
                    ...$data,
                    "password" => password_hash($data["password"], PASSWORD_ARGON2I),
                ];
                $userId = $this->userModel->create($userData);

                if ($userId) {
                    $user = $this->userModel->fetchById($userId);
                    Auth::login($user);

                    return redirect("/");
                }
            }

            return view("register", [
                "error" => "Something went wrong",
            ]);
        }

        return view("register");
    }

    public function profile()
    {

        $user = Auth::user();
        $properties = $this->propertyModel->fetchManyByField("owner_id", $user->id);

        return view("profile", [
            "properties" => $properties,
            "user" => $user,
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        if (isPostRequest()) {
            $data = getBody();
            $userData = [
                "name" => $data["name"],
                "avatar" => $data["avatar"],
                "about" => $data["about"],
            ];
            $this->userModel->updateById($user->id, $userData);
            $user = $this->userModel->fetchById($user->id);
            Auth::login($user);

            return redirect("/profile");
        }


        return view("account", ["user" => $user, "title" => "My account", "button" => "Update Account"]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }

}
