<?php

declare(strict_types=1);

namespace AndKom\Bitcoin\Address\Tests;

use AndKom\Bitcoin\Address\Network\NetworkFactory;
use AndKom\Bitcoin\Address\Output\OutputFactory;
use AndKom\Bitcoin\Address\Output\OutputInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class P2wpkhTest
 * @package AndKom\Bitcoin\Address\Tests
 */
class P2wpkhTest extends TestCase
{
    /**
     * @return OutputInterface
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    protected function getOutput(): OutputInterface
    {
        return OutputFactory::p2wpkh(hex2bin('751e76e8199196d454941c45d1b3a323f1433bd6'));
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testHex()
    {
        $this->assertEquals('0014751e76e8199196d454941c45d1b3a323f1433bd6', $this->getOutput()->hex());
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAsm()
    {
        $this->assertEquals('0 PUSHDATA(20)[751e76e8199196d454941c45d1b3a323f1433bd6]', $this->getOutput()->asm());
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressBitcoin()
    {
        $this->assertEquals('bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t4', $this->getOutput()->address());
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressBitcoinTestnet()
    {
        $this->assertEquals('tb1qw508d6qejxtdg4y5r3zarvary0c5xw7kxpjzsx', $this->getOutput()->address(NetworkFactory::bitcoinTestnet()));
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressBitcoinCash()
    {
        $this->assertEquals('bitcoincash:qp63uahgrxged4z5jswyt5dn5v3lzsem6cy4spdc2h', $this->getOutput()->address(NetworkFactory::bitcoinCash()));
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressLitecoin()
    {
        $this->assertEquals('ltc1qw508d6qejxtdg4y5r3zarvary0c5xw7kgmn4n9', $this->getOutput()->address(NetworkFactory::litecoin()));
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressLitecoinTestnet()
    {
        $this->assertEquals('tltc1qw508d6qejxtdg4y5r3zarvary0c5xw7klfsuq0', $this->getOutput()->address(NetworkFactory::litecoinTestnet()));
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressViacoin()
    {
        $this->assertEquals('via1qw508d6qejxtdg4y5r3zarvary0c5xw7kxzdzsn', $this->getOutput()->address(NetworkFactory::viacoin()));
    }

    /**
     * @throws \AndKom\Bitcoin\Address\Exception
     */
    public function testAddressViacoinTestnet()
    {
        $this->assertEquals('tvia1qw508d6qejxtdg4y5r3zarvary0c5xw7k3swtre', $this->getOutput()->address(NetworkFactory::viacoinTestnet()));
    }
}