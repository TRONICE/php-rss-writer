<?php

namespace Suin\RSSWriter;

/**
 * Class ItemPodcast
 * @package Suin\RSSWriter
 */
class ItemPodcast
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $subtitle;

    /** @var string */
    protected $author;

    /** @var string */
    protected $summary;

    /** @var string */
    protected $image;

    /** @var string */
    protected $duration;

    /** @var string */
    protected $explicit;

    /** @var int */
    protected $episode;

    /** @var int */
    protected $season;

    /** @var string */
    protected $episodeType;

    /** @var string */
    protected $block;

    protected $preferCdata = false;

    /**
     * Set item itunes:author
     * @param string $author
     * @return $this
     */
    public function author($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Set item itunes:title
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set item itunes:subtitle
     * @param string $subtitle
     * @return $this
     */
    public function subtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * Set item itunes:summary
     * @param string $summary
     * @return $this
     */
    public function summary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Set item itunes:image
     * @param string $image
     * @return $this
     */
    public function image($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Set item itunes:duration
     * @param string $duration
     * @return $this
     */
    public function duration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Set item itunes:explicit
     * @param string $explicit
     * @return $this
     */
    public function explicit($explicit)
    {
        $this->explicit = $explicit;
        return $this;
    }

    /**
     * Set item itunes:episode
     * @param integer $episode
     * @return $this
     */
    public function episode($episode)
    {
        $this->episode = $episode;
        return $this;
    }

    /**
     * Set item itunes:season
     * @param integer $season
     * @return $this
     */
    public function season($season)
    {
        $this->season = $season;
        return $this;
    }

    /**
     * Set item itunes:episodeType
     * @param string $episodeType
     * @return $this
     */
    public function episodeType($episodeType)
    {
        $this->episodeType = $episodeType;
        return $this;
    }

    /**
     * Set item itunes:block
     * @param string $block
     * @return $this
     */
    public function block($block)
    {
        $this->block = $block;
        return $this;
    }

    public function preferCdata($preferCdata)
    {
        $this->preferCdata = (bool)$preferCdata;
        return $this;
    }

    public function asXML()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><item></item>', LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

        if ($this->title !== null) {
            $xml->addChild('xmlns:itunes:title', $this->title);
        }

        if ($this->author !== null) {
            $xml->addChild('xmlns:itunes:author', $this->author);
        }

        if ($this->subtitle !== null) {
            $xml->addChild('xmlns:itunes:subtitle', $this->subtitle);
        }

				if ($this->summary !== null) {
						if ($this->preferCdata) {
								$xml->addCdataChild('xmlns:itunes:summary', $this->summary);
						} else {
								$xml->addChild('summary', $this->summary);
						}
				}

        if ($this->image !== null) {
            $image = $xml->addChild('xmlns:itunes:image');
            $image->addAttribute('href', $this->image);
        }

        if ($this->duration !== null) {
            $xml->addChild('xmlns:itunes:duration', $this->duration);
        }

        if ($this->explicit !== null) {
            $xml->addChild('xmlns:itunes:explicit', $this->explicit);
        }

        if ($this->episode !== null && is_integer($this->episode)) {
            $xml->addChild('xmlns:itunes:episode', $this->episode);
        }

        if ($this->season !== null && is_integer($this->season)) {
            $xml->addChild('xmlns:itunes:season', $this->season);
        }

        if ($this->episodeType) {
            $xml->addChild('xmlns:itunes:episodeType', $this->episodeType);
        }

        if ($this->block) {
            $xml->addChild('xmlns:itunes:block', $this->block);
        }

        return $xml;
    }
}
