<?php

use Firebase\JWT\JWT;
use App\Models\AuthModel;

function getJWTRequest($authenticationHeader){

    if (is_null($authenticationHeader)){
        
        throw new Exception('Missing or Invalid JWT Request');
    }
    return explode(' ',$authenticationHeader)[1];

}

function validateJWTRequest($encodeToken){

    $key = getenv('JWT_SECRET_KEY');
    $decodeToken = JWT::decode($encodeToken, $key, ['HS256']);
    $authModel = new AuthModel();
    $authModel->findUserByEmail($decodeToken->email);

}

function createJWT($email){

    $key = getenv('JWT_SECRET_KEY');
    $time = time();
    $timeToLive = getenv('JWT_TIME_TO_LIVE');
    $tokenExp = $time + $timeToLive;

    $payload = [

        'email' => $email,
        'iat' => $time,
        'exp' => $tokenExp
    ];

    $jwt = JWT::encode($payload, $key);
    return $jwt;
}

