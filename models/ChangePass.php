<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\Userlogin;

/**
 * Password reset form
 */
class ChangePass extends Model
{
    public $password;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword($id)
    {
    	$modelupdate = Userlogin::find()->where(['id'=>$id])->one();
        $modelupdate->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $modelupdate->save(false);
    }
}
