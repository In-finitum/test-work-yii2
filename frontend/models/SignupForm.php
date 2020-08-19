<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const MIN_AGE = 5;
    const MAX_AGE = 150;

    public $username;
//    public $email;
    public $password;
    public $date;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => "Не может быть пустым."],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это имя пользователя уже занято.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['date', 'required', 'message' => 'Не может быть пустым.'],
            ['date', 'safe'],
//            ['date', 'compareDate'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],

            ['password', 'required', 'message' => 'Не может быть пустым.'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function compareDate() {
        $date = date($this->date);
        $age = date("Y") - date("Y", strtotime($date));
        $ageError = '';
        if($age < self::MIN_AGE){
//            $this->addError('date', 'Too young!');
            $ageError = 'Too young!';
        }
        if($age > self::MAX_AGE) {
//            $this->addError('date', 'Too old!');
            $ageError = 'Too old!';
        }
        return $ageError;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Ник',
            'password' => 'Пароль',
            'date' => 'Дата рождения',
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
//        $user->email = $this->email;
        $user->date = $this->date;
        $user->setPassword($this->password);
        $user->generateAuthKey();
//        $user->generateEmailVerificationToken();
        $user->status = 10;
        return $user->save()/* && $this->sendEmail($user)*/;

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
