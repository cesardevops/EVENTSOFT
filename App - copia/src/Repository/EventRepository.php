<?php
namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

class EventRepository extends ServiceEntityRepository
{
    /**
     * EventRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * @param int $firstResult
     * @param int $maxResult
     * @return array
     */
    public function findEventPublishes($firstResult = 0, $maxResult = 5)
    {
        $query_view = "select COUNT(e.id) AS total from App:Event e ";
        $query =    $this->getEntityManager()
            ->createQuery($query_view);

        $total =  $query->execute();

        $sql = "select e.id, e.title, e.shortdescription, e.startDate, e.thumb, e.duration from App:Event e";
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

    /**
     * Validamos que el usuario no registre dos veces el mismo evento como interes
     * @param $eventid
     * @param $userid
     * @return float|int
     */
    public function findEventXuser($eventid, $userid){
        $parameters = [
            'iduser' => $userid,
            'idevent' => $eventid,
        ];
        $query_view = "SELECT COUNT(e.id) AS total FROM App:Userxevent e  WHERE e.event = :idevent AND e.user = :iduser";
        $query =    $this->getEntityManager()->createQuery($query_view)->setParameters($parameters);
        $total =  $query->execute();

        return $total[0]['total']*1;
    }

    public function getMyinterest($firstResult = 0, $maxResult = 5, $userid){

        $parameters = [
            'iduser' => $userid,
        ];
        $query_view = "SELECT COUNT(e.id) AS total FROM App:Userxevent e  WHERE e.user = :iduser AND e.interest = 1 AND e.attended = 0 ";
        $query =    $this->getEntityManager()
            ->createQuery($query_view)->setParameters($parameters);
        $total =  $query->execute();

        $_query_result = " SELECT ex.id as userxevent,e.id, e.title, e.shortdescription, e.startDate, e.thumb, e.duration FROM App:Userxevent ex  INNER JOIN App:Event e WITH ex.event = e.id  WHERE ex.user = ".$userid." AND ex.interest = 1 AND ex.attended = 0 ";
        $result =    $this->getEntityManager()->createQuery($_query_result)->setFirstResult($firstResult)->setMaxResults($maxResult)->getResult();;

        $_Response = array(
            "status"        => Response::HTTP_ACCEPTED,
            "total"         =>  ($total[0]['total']*1),
            "pages"         => ceil( ($total[0]['total'] / $maxResult)),
            'eventos'    => $result,
        );
        return $_Response;

    }

    public function getMyLoves($firstResult = 0, $maxResult = 5, $userid){

        $parameters = [
            'iduser' => $userid,
        ];
        $query_view = "SELECT COUNT(e.id) AS total FROM App:Userxevent e  WHERE e.user = :iduser AND e.interest = 0 AND e.attended = 1 ";
        $query =    $this->getEntityManager()
            ->createQuery($query_view)->setParameters($parameters);
        $total =  $query->execute();

        $_query_result = " SELECT ex.id as userxevent,e.id, e.title, e.shortdescription, e.startDate, e.thumb, e.duration FROM App:Userxevent ex  INNER JOIN App:Event e WITH ex.event = e.id  WHERE ex.user = ".$userid." AND ex.interest = 0 AND ex.attended = 1 ";
        $result =    $this->getEntityManager()->createQuery($_query_result)->setFirstResult($firstResult)->setMaxResults($maxResult)->getResult();;

        $_Response = array(
            "status"        => Response::HTTP_ACCEPTED,
            "total"         =>  ($total[0]['total']*1),
            "pages"         => ceil( ($total[0]['total'] / $maxResult)),
            'eventos'    => $result,
        );
        return $_Response;

    }
}