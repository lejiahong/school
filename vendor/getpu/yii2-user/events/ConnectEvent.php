<?php

/*** Created by getpu on 16/8/19.*/

namespace getpu\user\events;

use getpu\user\models\User;
use getpu\user\models\Account;
use yii\base\Event;

/**
 * @property User    $model
 * @property Account $account
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class ConnectEvent extends Event
{
    /**
     * @var User
     */
    private $_user;

    /**
     * @var Account
     */
    private $_account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->_account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account)
    {
        $this->_account = $account;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param User $form
     */
    public function setUser(User $user)
    {
        $this->_user = $user;
    }
}
