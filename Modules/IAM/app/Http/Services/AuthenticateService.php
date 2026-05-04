<?php
namespace Modules\IAM\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticateService
{
    // for mobile
    public function checkPassword(string $username, string $password)
    {
        $user = User::with("profile.person")
            ->where("username", $username)
            ->first();
        if (!$user) {
            throw new \DomainException("usuario incorrecto.");
        }
        // verificamos el password
        if (!Hash::check($password, $user->password)) {
            throw new \DomainException("Password incorrect.");
        }
        $menus = $user
            ->effectivePermissions()
            ->where("permissions.action", "view")
            ->get()
            ->groupBy("module");

        $token = $user->createToken("api-token");

        $user->token = $token->plainTextToken;

        $user->menus = $menus;

        return $user;
    }

    public function recoverSession(User $user)
    {
        $user = $user->load("profile.person", "profile.employee.position");
        $menus = $user
            ->effectivePermissions()
            ->where("permissions.action", "view")
            ->get()
            ->groupBy("module");
        // quizas generar un error si no tiene menus activos asignados

        $token = $user->createToken("api-token");

        $user->token = $token->plainTextToken;

        // que necesitamos , limpiar la informacion obtenida
        // separar por modulo , y el resource es la sub opcion interna que pueden ver
        // el action es lo que pueden ejecutar dentro

        $user->menus = $menus;

        return $user;
    }
}
