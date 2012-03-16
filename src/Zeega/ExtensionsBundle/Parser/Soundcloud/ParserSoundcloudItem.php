<?php

namespace Zeega\ExtensionsBundle\Parser\Soundcloud;

use Zeega\CoreBundle\Parser\Base\ParserItemAbstract;
use Zeega\DataBundle\Entity\Media;
use Zeega\DataBundle\Entity\Tag;
use Zeega\DataBundle\Entity\Item;
use Zeega\DataBundle\Entity\Metadata;
use Symfony\Component\HttpFoundation\Response;

use \DateTime;

class ParserSoundcloudItem extends ParserItemAbstract
{
	private static $soundcloudConsumerKey = 'lyCI2ejeGofrnVyfMI18VQ';
	
	public function getItem($url,$itemId)
	{
		$itemUrl = "http://api.soundcloud.com/resolve.json?url=$url&consumer_key=".self::$soundcloudConsumerKey;
		
		$itemJson = file_get_contents($itemUrl,0,null,null);
		$itemJson = json_decode($itemJson,true);
		
		if(!$itemJson["streamable"])
		{
			return $this->returnResponse($item, false,"This track is not embeddable and cannot be added to Zeega.");
		}
		
		$item = new Item();
		$metadata = new Metadata();
		$media = new Media();
		
		$attr=array();
		$attr['tags']=$itemJson["tag_list"];
		$metadata->setThumbnailUrl($itemJson['waveform_url']);

		$item->setTitle($itemJson['permalink']);

		$item->setDescription($itemJson['description']);

		$item->setMediaCreatorUsername($itemJson['user']['username']);
		$item->setMediaCreatorRealname($itemJson['user']['username']);
		$item->setMediaType('Audio');
		$item->setLayerType('Audio');
		$item->setArchive('SoundCloud');
		$item->setUri($itemJson['stream_url']);
		$item->setUri($item->getUri().'?consumer_key='.self::$soundcloudConsumerKey);
		$item->setDateCreated(new DateTime((string)$itemJson['created_at']));
		$item->setThumbnailUrl($itemJson['waveform_url']);
		$item->setChildItemsCount(0);

		$duration=$itemJson['duration'];
		$media->setDuration(floor($duration/1000));

		$metadata->setLicense($itemJson['license']);
		
		$item->setMetadata($metadata);
		$item->setMedia($media);
		
		return $this->returnResponse($item, true);
	}
}
