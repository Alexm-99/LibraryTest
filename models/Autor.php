<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property string $id_autor
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string $id_libro_FK
 *
 * @property Libros $libroFK
 */
class Autor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_autor', 'id_libro_FK'], 'required'],
            [['id_autor', 'id_libro_FK'], 'string', 'max' => 11],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['id_autor'], 'unique'],
            [['id_libro_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::class, 'targetAttribute' => ['id_libro_FK' => 'id_libro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_autor' => 'Id Autor',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'id_libro_FK' => 'Id Libro Fk',
        ];
    }

    /**
     * Gets query for [[LibroFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLibroFK()
    {
        return $this->hasOne(Libros::class, ['id_libro' => 'id_libro_FK']);
    }
}
