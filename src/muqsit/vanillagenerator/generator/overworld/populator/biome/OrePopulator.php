<?php

declare(strict_types=1);

namespace muqsit\vanillagenerator\generator\overworld\populator\biome;

use muqsit\vanillagenerator\generator\object\OreType;
use muqsit\vanillagenerator\generator\object\OreVein;
use muqsit\vanillagenerator\generator\overworld\populator\biome\utils\OreTypeHolder;
use muqsit\vanillagenerator\generator\Populator;
use pocketmine\block\VanillaBlocks;
use pocketmine\utils\Random;
use pocketmine\world\ChunkManager;
use pocketmine\world\format\Chunk;

class OrePopulator implements Populator
{

	/** @var OreTypeHolder[] */
	private $ores = [];

	/**
	 * Creates a populator for dirt, gravel, andesite, diorite, granite; and coal, iron, gold,
	 * redstone, diamond and lapis lazuli ores.
	 */
	public function __construct()
	{
		$this->addOre(new OreType(VanillaBlocks::DIRT(), 0, 256, 32), 10);
		$this->addOre(new OreType(VanillaBlocks::GRAVEL(), 0, 256, 32), 8);
		$this->addOre(new OreType(VanillaBlocks::GRANITE(), 0, 80, 32), 10);
		$this->addOre(new OreType(VanillaBlocks::DIORITE(), 0, 80, 32), 10);
		$this->addOre(new OreType(VanillaBlocks::ANDESITE(), 0, 80, 32), 10);
		$this->addOre(new OreType(VanillaBlocks::COAL_ORE(), 0, 128, 16), 20);
		$this->addOre(new OreType(VanillaBlocks::IRON_ORE(), 0, 64, 8), 20);
		$this->addOre(new OreType(VanillaBlocks::GOLD_ORE(), 0, 32, 8), 2);
		$this->addOre(new OreType(VanillaBlocks::REDSTONE_ORE(), 0, 16, 7), 8);
		$this->addOre(new OreType(VanillaBlocks::DIAMOND_ORE(), 0, 16, 7), 1);
		$this->addOre(new OreType(VanillaBlocks::LAPIS_LAZULI_ORE(), 16, 16, 6), 1);
	}

	protected function addOre(OreType $type, int $value): void
	{
		$this->ores[] = new OreTypeHolder($type, $value);
	}

	public function populate(ChunkManager $world, Random $random, int $chunkX, int $chunkZ, Chunk $chunk): void
	{
		$cx = $chunkX << 4;
		$cz = $chunkZ << 4;

		foreach ($this->ores as $ore_type_holder) {
			for ($n = 0; $n < $ore_type_holder->value; ++$n) {
				$sourceX = $cx + $random->nextBoundedInt(16);
				$sourceZ = $cz + $random->nextBoundedInt(16);
				$sourceY = $ore_type_holder->type->getRandomHeight($random);
				(new OreVein($ore_type_holder->type))->generate($world, $random, $sourceX, $sourceY, $sourceZ);
			}
		}
	}
}