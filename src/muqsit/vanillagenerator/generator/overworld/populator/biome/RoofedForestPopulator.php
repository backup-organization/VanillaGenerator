<?php

declare(strict_types=1);

namespace muqsit\vanillagenerator\generator\overworld\populator\biome;

use muqsit\vanillagenerator\generator\object\tree\BirchTree;
use muqsit\vanillagenerator\generator\object\tree\BrownMushroomTree;
use muqsit\vanillagenerator\generator\object\tree\DarkOakTree;
use muqsit\vanillagenerator\generator\object\tree\GenericTree;
use muqsit\vanillagenerator\generator\object\tree\RedMushroomTree;
use muqsit\vanillagenerator\generator\overworld\biome\BiomeIds;
use muqsit\vanillagenerator\generator\overworld\decorator\types\TreeDecoration;

class RoofedForestPopulator extends ForestPopulator{

	private const BIOMES = [BiomeIds::ROOFED_FOREST, BiomeIds::MUTATED_ROOFED_FOREST];

	/** @var TreeDecoration[] */
	protected static $TREES;

	public static function init() : void{
		self::$TREES = [
			new TreeDecoration(GenericTree::class, 20),
			new TreeDecoration(BirchTree::class, 5),
			new TreeDecoration(RedMushroomTree::class, 2),
			new TreeDecoration(BrownMushroomTree::class, 2),
			new TreeDecoration(DarkOakTree::class, 50)
		];
	}

	protected function initPopulators() : void{
		$this->treeDecorator->setAmount(50);
		$this->treeDecorator->setTrees(...self::$TREES);
		$this->tallGrassDecorator->setAmount(4);
	}

	public function getBiomes() : array{
		return self::BIOMES;
	}
}

RoofedForestPopulator::init();