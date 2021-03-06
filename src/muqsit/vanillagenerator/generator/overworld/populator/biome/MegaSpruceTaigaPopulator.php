<?php

declare(strict_types=1);

namespace muqsit\vanillagenerator\generator\overworld\populator\biome;

use muqsit\vanillagenerator\generator\object\tree\MegaSpruceTree;
use muqsit\vanillagenerator\generator\object\tree\RedwoodTree;
use muqsit\vanillagenerator\generator\object\tree\TallRedwoodTree;
use muqsit\vanillagenerator\generator\overworld\biome\BiomeIds;
use muqsit\vanillagenerator\generator\overworld\decorator\types\TreeDecoration;

class MegaSpruceTaigaPopulator extends MegaTaigaPopulator
{

	/** @var TreeDecoration[] */
	protected static $TREES;

	protected static function initTrees(): void
	{
		self::$TREES = [
			new TreeDecoration(RedwoodTree::class, 44),
			new TreeDecoration(TallRedwoodTree::class, 22),
			new TreeDecoration(MegaSpruceTree::class, 33)
		];
	}

	public function getBiomes(): ?array
	{
		return [BiomeIds::MUTATED_REDWOOD_TAIGA, BiomeIds::MUTATED_REDWOOD_TAIGA_HILLS];
	}

	protected function initPopulators(): void
	{
		$this->treeDecorator->setTrees(...self::$TREES);
	}
}

MegaSpruceTaigaPopulator::init();