<?php

declare(strict_types=1);

namespace muqsit\vanillagenerator\generator\overworld\decorator\types;

use pocketmine\block\Block;

final class FlowerDecoration
{

	/** @var Block */
	private $block;

	/** @var int */
	private $weight;

	public function __construct(Block $block, int $weight)
	{
		$this->block = $block;
		$this->weight = $weight;
	}

	public function getBlock(): Block
	{
		return $this->block;
	}

	public function getWeight(): int
	{
		return $this->weight;
	}
}