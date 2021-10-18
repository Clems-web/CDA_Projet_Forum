<?php

namespace Cleme\Forum\Model\Manager;

use Cleme\Forum\Model\DB;
use Cleme\Forum\Model\Entity\User;

class UserManager {

    // Get all User
    public function getUser() {
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach($data as $user_data) {
                $user[] = new User(
                    $user_data['id'],
                    $user_data['username'],
                    $user_data['mail'],
                    $user_data['password'],
                    $user_data['token'],
                    $user_data['confirmed'],
                    $user_data['role_fk']
                );
            }
        }
        return $user;
    }

    public function getUserPass($mail) {
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);

        $result = $request->execute();
        if ($result) {
            $data = $request->fetch();
            if ($data) {
                $user = new User(
                    $data['id'],
                    $data['username'],
                    $data['mail'],
                    $data['password'],
                    $data['token'],
                    $data['confirmed'],
                    $data['role_fk']
                );
            }
        }
        return $user;
    }

    // User connect
    public function connectUser(string $mail, string $password){

        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);

        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                if (password_verify($password, $user_data['password'])) {
                    $user = new User(
                        $user_data['id'],
                        $user_data['username'],
                        $user_data['mail'],
                        $password,
                        $user_data['token'],
                        $user_data['confirmed'],
                        $user_data['role_fk']
                    );
                    return $user;
                }
            }
        }
        return false;
    }


    // If user's Id is null or equal to 0, that's an insert into DB
    public function saveUser(User $user) : string {
        if ($user->getId() === 0 || $user->getId() == null) {
            $request = DB::getInstance()->prepare("
        INSERT INTO user(username, mail, password, token, confirmed, role_fk) VALUES (:username, :mail, :password, :token, :confirmed ,:role_fk)
        ");

            $request->bindValue(':username', $user->getUsername());
            $request->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $request->bindValue(':mail', $user->getMail());
            $request->bindValue(':token', $user->getToken());
            $request->bindValue(':confirmed', $user->getConfirmed());
            $request->bindValue(':role_fk', $user->getRole());

            $request->execute();
        }

        // Else it's an User's update
        else {
            $request = DB::getInstance()->prepare("
            UPDATE user SET username = :username, password = :password, mail = :mail, token = :token, confirmed = :confirmed, role_fk = :role_fk WHERE id = :id
            ");

            $request->bindValue(':username', $user->getUsername());
            $request->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $request->bindValue(':mail', $user->getMail());
            $request->bindValue(':token', $user->getToken());
            $request->bindValue(':confirmed', $user->getConfirmed());
            $request->bindValue(':role_fk', $user->getRole());
            $request->bindValue(':id', $user->getId());

            $request->execute();

            if ($request) {
                echo "User updated";
                return 'ok';
            }
        }
        return "";
    }

    public function confirmUser($tokenId) {
        $request = DB::getInstance()->prepare("
            UPDATE user SET token = :token, confirmed = :confirmed WHERE token = :tokenId
        ");

        $request->bindValue(':tokenId', $tokenId);
        $request->bindValue(':token', '');
        $request->bindValue(':confirmed', 1);

        $request->execute();
    }


}