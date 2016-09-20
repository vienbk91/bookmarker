<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Bookmarks
 *
 * @method \App\Model\Entity\Note get($primaryKey, $options = [])
 * @method \App\Model\Entity\Note newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Note[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Note|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Note patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Note[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Note findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */

class NotesTable extends Table {
	/**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('notes');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }
}