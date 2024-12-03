<?php
namespace App\GraphQL\Resolvers;
use App\Models\User;

class UserResolver{
    public function getAll($root, $args, $context, $info){
        return User::all();
    }
}
