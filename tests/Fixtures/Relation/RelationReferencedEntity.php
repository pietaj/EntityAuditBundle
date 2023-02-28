<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\EntityAuditBundle\Tests\Fixtures\Relation;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({ "foobar" = "RelationFoobarEntity" })
 */
#[ORM\Entity]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'discr', type: Types::STRING)]
#[ORM\DiscriminatorMap(['foobar' => RelationFoobarEntity::class])]
abstract class RelationReferencedEntity extends RelationAbstractEntityBase
{
    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    #[ORM\Column(type: Types::STRING)]
    protected $referencedField;

    /**
     * @var RelationOneToOneEntity|null
     *
     * @ORM\OneToOne(targetEntity="RelationOneToOneEntity", mappedBy="referencedEntity")
     */
    #[ORM\OneToOne(targetEntity: RelationOneToOneEntity::class, mappedBy: 'referencedEntity')]
    protected $oneToOne;

    public function getOneToOne(): ?RelationOneToOneEntity
    {
        return $this->oneToOne;
    }

    public function setOneToOne(RelationOneToOneEntity $oneToOne): void
    {
        $this->oneToOne = $oneToOne;
    }

    public function getReferencedField(): ?string
    {
        return $this->referencedField;
    }

    public function setReferencedField(string $referencedField): void
    {
        $this->referencedField = $referencedField;
    }
}
