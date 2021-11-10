<?php

namespace Tests\Feature;

use App\Serie;
use Tests\TestCase;
use App\Service\CriadorDeSerie;
use App\Service\RemovedorDeSerie;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    /** @var Serie */
    private $serie;
    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie(
            'Nome da Série',
            1,
            1
        );/*  */
    }

    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        $removedorDeSerie = new RemovedorDeSerie();
        $serie = $removedorDeSerie->removerSerie($this->serie->id);
        $this->assertIsString($serie->nome);
        $this->assertEquals('Nome da Série', $serie->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
