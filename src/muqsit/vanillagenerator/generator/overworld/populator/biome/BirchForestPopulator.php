<?php

declare(strict_types=1);

namespace muqsit\vanillagenerator\generator\overworld\populator\biome;

use muqsit\vanillagenerator\generator\object\tree\BirchTree;
use muqsit\vanillagenerator\generator\overworld\biome\BiomeIds;
use muqsit\vanillagenerator\generator\overworld\decorator\types\TreeDecoration;

class BirchForestPopulator extends ForestPopulator{

	private const BIOMES = [BiomeIds::BIRCH_FOREST, BiomeIds::BIRCH_FOREST_HILLS];

	/** @var TreeDecoration[] */
	protected static $TREES;

	public static function init() : void{
		self::$TREES = [
			new TreeDecoration(BirchTree::class, 1)
		];
	}

	protected function initPopulators() : void{
		$this->treeDecorator->setTrees(...self::$TREES);
	}

	public function getBiomes() : array{
		return self::BIOMES;
	}
}

BirchForestPopulator::init();