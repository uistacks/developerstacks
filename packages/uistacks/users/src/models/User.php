<?php

namespace Uistacks\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Notifiable;

//class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Special data types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'options' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone','provider', 'provider_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'active', 'created_by', 'updated_by', 'confirmation_code', 'created_at', 'updated_at', 'main_image_id', 'options'];

    /**
     * The relationships attributes that are needed.
     *
     * @var array
     */
    protected $with = ['userRole'];

    /**
     * Roles relation.
     *
     *
     */
    public function userRole()
    {
        return $this->hasOne('Uistacks\Users\Models\UserRole', 'user_id');
    }

    public function getProfileImage()
    {
        return $this->hasOne('Uistacks\Users\Models\UserRole', 'uploaded_by');
    }


    /**
     * Main image relation.
     */
    public function mainImage()
    {
        $mediaOptions = '';
        $options = $this->options;

        if($options && $options['media'] && isset($options['media']['main_image_id'])){
            $mainImageId = $options['media']['main_image_id'];


            $media = \Uistacks\Media\Models\Media::find($mainImageId);


            if($media){
                $id = $media->id;
                $file = $media->file;
                $styles = $media->options['styles'];
                $mediaOptions = ['id' => $id, 'styles' => $styles, 'file' => $file];

            }
        }

//        return $this->mediaOptions;
        return (object) $mediaOptions;
    }

    /**
     * Get media attribute.
     */
    public function getMediaAttribute()
    {

        return (object) ['main_image' => $this->mainImage()];
    }

    /**
     * Author relation.
     *
     *
     */
    public function author()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'created_by')->select(array('id', 'name'));
    }

    /**
     * Author relation.
     *
     *
     */
    public function lastUpdatedBy()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'updated_by')->select(array('id', 'name'));
    }

    /**
     * Account Relation.
     *
     *
     */
    // public function userAccount()
    // {
    //     return $this->hasOne('App\Account', 'user_id');
    // }

    /**
     * Country relation.
     */
    public function country()
    {
        return $this->belongsTo('Uistacks\Locations\Models\Country', 'country_id', 'id')->select(array('id', 'iso2'));
    }

    /**
     * State relation.
     */
    public function state()
    {
        return $this->belongsTo('Uistacks\Locations\Models\State', 'state_id' , 'id')->select(array('id'));
    }

    /**
     * City relation.
     */
    public function city()
    {
        return $this->belongsTo('Uistacks\Locations\Models\City', 'city_id')->select(array('id'));
    }
    /**
     * Scope a query to only include filterd ads name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterName($query)
    {
        $getName = '';
        if(isset($_GET['name']) && !empty($_GET['name'])){
            $getName = $_GET['name'];
            return $query->where('name', 'LIKE', '%'.$getName.'%');
        }
    }
    public function scopeFilterStatus($query) {
        $getStatus = '';
        //dd($_GET['status']);
        if(isset($_GET['status']) && !empty($_GET['status'])){
            if($_GET['status'] == 1){
                $getStatus = $_GET['status'];
            }else{
                $getStatus = 0;
            }
            return $query->where('active', $getStatus);
        }
    }

    /**
     * Scope a query to only include filterd ads name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterRole($query, $roleId)
    {
        if($roleId == 3) {
            return $query->whereHas('userRole', function ($query) use ($roleId) {
                $query->where('role_id', $roleId);
            });
        }else{
            return $query->whereHas('userRole', function ($query) use ($roleId) {
                $query->where('role_id', '!=', 3);
            });
        }
    }


    public function hasPermission()
    {
        return $this->hasMany('Uistacks\Users\Models\PermissionUser', 'user_id');

    }

    public function hasRole()
    {
        return $this->hasOne('Uistacks\Users\Models\UserRole', 'user_id')->select("role_id");

    }
}
