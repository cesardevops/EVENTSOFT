<?php
namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findEventPublishes($firstResult = 0, $maxResult = 5)
    {
        $query_view = "select COUNT(e.id) AS total from App:Event e ";
        $query =    $this->getEntityManager()
            ->createQuery($query_view);

        $total =  $query->execute();

        $sql = "select e.id, e.name, e.startDate,e.coverImage, e.duration from App:Event e";
        $result = $this->getEntityManager()->createQuery($sql)->setFirstResult($firstResult)->setMaxResults($maxResult)->getResult();
        //return $result;

        $_Response = array(
            "status"        => Response::HTTP_ACCEPTED,
            "total"         =>  ($total[0]['total']*1),
            "pages"         => ceil( ($total[0]['total'] / $maxResult)),
            'eventos'    => $result,
        );
        return $_Response;
        #return $this->createQueryBuilder('e')->select('DATE_FORMAT(start_date, \'%l:%i %p %b %e, %Y\')');
    }


}