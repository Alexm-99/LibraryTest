class Usuario extends CActiveRecord
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return array(
            array('username, email, password', 'required'),
            array('email', 'email'),
            array('password', 'length', 'min' => 8),
        );
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
