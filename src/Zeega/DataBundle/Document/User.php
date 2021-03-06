<?php

namespace Zeega\DataBundle\Document;

use FOS\UserBundle\Document\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Zeega\DataBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="int",name="rdbms_id")
     */
    protected $rdbmsId;

    /**
     * @MongoDB\Field(type="string", name="public_id")
     */
    protected $publicId;
    
    /**     
     * @MongoDB\Field(type="string",name="display_name")
     */
    protected $displayName;

    /**
     * @MongoDB\String
     */
    protected $bio;

    /**     
     * @MongoDB\Field(type="string",name="thumb_url")
     */
    protected $thumbUrl = "http://s3.amazonaws.com/zeegastatic/default_profile.jpeg";
 
    /**     
     * @MongoDB\Field(type="date",name="created_at")
     */
    protected $createdAt;

    /**
     * @MongoDB\String
     */
    protected $location;

    /**     
     * @MongoDB\Field(type="float",name="location_latitude")
     */
    protected $locationLatitude;

    /**     
     * @MongoDB\Field(type="float",name="location_longitude")
     */
    protected $locationLongitude;

    /**     
     * @MongoDB\Field(type="string",name="background_image_url")
     */
    protected $backgroundImageUrl;

    /**     
     * @MongoDB\Field(type="string",name="dropbox_delta")
     */
    protected $dropboxDelta;

    /**
     * @MongoDB\String
     */
    protected $idea;

    /**     
     * @MongoDB\Field(type="boolean",name="email_notifications_favorites")
     */
    protected $emailNotificationsOnFavorite = true;

    /**     
     * @MongoDB\Field(type="boolean",name="email_notifications_popular")
     */
    protected $emailNotificationsOnPopular = true;


    /**     
     * @MongoDB\Field(type="boolean",name="email_notifications_feature")
     */
    protected $emailNotificationsOnFeature = true;


    /**     
     * @MongoDB\Field(type="string",name="api_key")
     */
    protected $apiKey;

    /**     
     * @MongoDB\Field(type="string",name="twitter_id")
     */
    protected $twitterId;

    /**     
     * @MongoDB\Field(type="string",name="twitter_username")
     */
    protected $twitterUsername;

    /**     
     * @MongoDB\Field(type="string",name="twitter_access_token")
     */
    protected $twitterAccessToken;

    /**     
     * @MongoDB\Field(type="string",name="facebook_id")
     */
    protected $facebookId;

    /**     
     * @MongoDB\Field(type="string",name="facebook_access_token")
     */
    protected $facebookAccessToken;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Favorite", mappedBy="project")
     */
    protected $favorites;

    /**     
     * @MongoDB\Field(type="boolean",name="request_extra_info")
     */
    protected $requestExtraInfo;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     * @return \User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Get displayName
     *
     * @return string $displayName
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set bio
     *
     * @param string $bio
     * @return \User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * Get bio
     *
     * @return string $bio
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set thumbUrl
     *
     * @param string $thumbUrl
     * @return \User
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
        return $this;
    }

    /**
     * Get thumbUrl
     *
     * @return string $thumbUrl
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return \User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return \User
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get location
     *
     * @return string $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set locationLatitude
     *
     * @param float $locationLatitude
     * @return \User
     */
    public function setLocationLatitude($locationLatitude)
    {
        $this->locationLatitude = $locationLatitude;
        return $this;
    }

    /**
     * Get locationLatitude
     *
     * @return float $locationLatitude
     */
    public function getLocationLatitude()
    {
        return $this->locationLatitude;
    }

    /**
     * Set locationLongitude
     *
     * @param float $locationLongitude
     * @return \User
     */
    public function setLocationLongitude($locationLongitude)
    {
        $this->locationLongitude = $locationLongitude;
        return $this;
    }

    /**
     * Get locationLongitude
     *
     * @return float $locationLongitude
     */
    public function getLocationLongitude()
    {
        return $this->locationLongitude;
    }

    /**
     * Set backgroundImageUrl
     *
     * @param string $backgroundImageUrl
     * @return \User
     */
    public function setBackgroundImageUrl($backgroundImageUrl)
    {
        $this->backgroundImageUrl = $backgroundImageUrl;
        return $this;
    }

    /**
     * Get backgroundImageUrl
     *
     * @return string $backgroundImageUrl
     */
    public function getBackgroundImageUrl()
    {
        return $this->backgroundImageUrl;
    }

    /**
     * Set dropboxDelta
     *
     * @param string $dropboxDelta
     * @return \User
     */
    public function setDropboxDelta($dropboxDelta)
    {
        $this->dropboxDelta = $dropboxDelta;
        return $this;
    }

    /**
     * Get dropboxDelta
     *
     * @return string $dropboxDelta
     */
    public function getDropboxDelta()
    {
        return $this->dropboxDelta;
    }

    /**
     * Set idea
     *
     * @param string $idea
     * @return \User
     */
    public function setIdea($idea)
    {
        $this->idea = $idea;
        return $this;
    }

    /**
     * Get idea
     *
     * @return string $idea
     */
    public function getIdea()
    {
        return $this->idea;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     * @return \User
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string $apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set twitterId
     *
     * @param string $twitterId
     * @return \User
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;
        return $this;
    }

    /**
     * Get twitterId
     *
     * @return string $twitterId
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * Set twitterUsername
     *
     * @param string $twitterUsername
     * @return \User
     */
    public function setTwitterUsername($twitterUsername)
    {
        $this->twitterUsername = $twitterUsername;
        return $this;
    }

    /**
     * Get twitterUsername
     *
     * @return string $twitterUsername
     */
    public function getTwitterUsername()
    {
        return $this->twitterUsername;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     * @return \User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string $facebookId
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set idInteger
     *
     * @param int $idInteger
     * @return self
     */
    public function setIdInteger($idInteger)
    {
        $this->idInteger = $idInteger;
        return $this;
    }

    /**
     * Get idInteger
     *
     * @return int $idInteger
     */
    public function getIdInteger()
    {
        return $this->idInteger;
    }

    /**
     * Set rdbmsId
     *
     * @param int $rdbmsId
     * @return self
     */
    public function setRdbmsId($rdbmsId)
    {
        $this->rdbmsId = $rdbmsId;
        return $this;
    }

    /**
     * Get rdbmsId
     *
     * @return int $rdbmsId
     */
    public function getRdbmsId()
    {
        return $this->rdbmsId;
    }

    /**
     * Add favorites
     *
     * @param Zeega\DataBundle\Document\Favorite $favorites
     */
    public function addFavorite(\Zeega\DataBundle\Document\Favorite $favorites)
    {
        $this->favorites[] = $favorites;
    }

    /**
    * Remove favorites
    *
    * @param <variableType$favorites
    */
    public function removeFavorite(\Zeega\DataBundle\Document\Favorite $favorites)
    {
        $this->favorites->removeElement($favorites);
    }

    /**
     * Get favorites
     *
     * @return Doctrine\Common\Collections\Collection $favorites
     */
    public function getFavorites()
    {
        return $this->favorites;
    }

     /* Set salt
     *
     * @param string $oldId
     * @return \User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * Set salt
     *
     * @param string $oldId
     * @return \User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Set twitterAccessToken
     *
     * @param string $twitterAccessToken
     * @return self
     */
    public function setTwitterAccessToken($twitterAccessToken)
    {
        $this->twitterAccessToken = $twitterAccessToken;
        return $this;
    }

    /**
     * Get twitterAccessToken
     *
     * @return string $twitterAccessToken
     */
    public function getTwitterAccessToken()
    {
        return $this->twitterAccessToken;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     * @return self
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;
        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string $facebookAccessToken
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * Set publicId
     *
     * @param string $publicId
     * @return self
     */
    public function setPublicId($publicId)
    {
        $this->publicId = $publicId;
        return $this;
    }

    /**
     * Get publicId
     *
     * @return string $publicId
     */
    public function getPublicId()
    {
        return $this->publicId;
    }

    /**
     * Set requestExtraInfo
     *
     * @param boolean $requestExtraInfo
     * @return self
     */
    public function setRequestExtraInfo($requestExtraInfo)
    {
        $this->requestExtraInfo = $requestExtraInfo;
        return $this;
    }

    /**
     * Get requestExtraInfo
     *
     * @return boolean $requestExtraInfo
     */
    public function getRequestExtraInfo()
    {
        return $this->requestExtraInfo;
    }

    /**
     * Set emailNotificationsOnFavorite
     *
     * @param boolean $emailNotificationsOnFavorite
     * @return self
     */
    public function setEmailNotificationsOnFavorite($emailNotificationsOnFavorite)
    {
        $this->emailNotificationsOnFavorite = $emailNotificationsOnFavorite;
        return $this;
    }

    /**
     * Get emailNotificationsOnFavorite
     *
     * @return boolean $emailNotificationsOnFavorite
     */
    public function getEmailNotificationsOnFavorite()
    {
        return $this->emailNotificationsOnFavorite;
    }
        /**
     * Set emailNotificationsOnPopular
     *
     * @param boolean $emailNotificationsOnPopular
     * @return self
     */
    public function setEmailNotificationsOnPopular($emailNotificationsOnPopular)
    {
        $this->emailNotificationsOnPopular = $emailNotificationsOnPopular;
        return $this;
    }

    /**
     * Get emailNotificationsPopular
     *
     * @return boolean $emailNotificationsOnPopular
     */
    public function getEmailNotificationsOnPopular()
    {
        return $this->emailNotificationsOnPopular;
    }

        /**
     * Set emailNotificationsOnFeature
     *
     * @param boolean $emailNotificationsOnFeature
     * @return self
     */
    public function setEmailNotificationsOnFeature($emailNotificationsOnFeature)
    {
        $this->emailNotificationsOnFeature = $emailNotificationsOnFeature;
        return $this;
    }

    /**
     * Get emailNotificationsOnFeature
     *
     * @return boolean $emailNotificationsOnFeature
     */
    public function getEmailNotificationsOnFeature()
    {
        return $this->emailNotificationsOnFeature;
    }


}
