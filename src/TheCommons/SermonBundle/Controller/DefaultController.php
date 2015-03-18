<?php

namespace TheCommons\SermonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    public function getAction($format)
    {
        if($format == 'xml') {
            # xml for podcast
            throw new NotFoundHttpException('No XML yet...');
        } else {
            # json
            $response = new JsonResponse();
            $hax = json_decode('{
    "podcast-title": "The Commons Church - Sermon Podcast",
    "podcast-subtitle": "Official Sermon Audio of The Commons Church in San Diego.",
    "podcast-author": "The Commons",
    "podcast-image": "http:\/\/thecommonsforall.com\/sermons\/media\/COMMONSpodcastimage.png",
    "podcast-desc": "This is the official audio podcast of The Commons, a church located in the North Park neighborhood of San Diego. The Commons is a community conspiring to proclaim the Cross, cultivating disciples, embracing the oppressed, and inviting you to join the movement. To learn more about us visit our web site at www.thecommonsforall.com",
    "podcast-link": "http:\/\/www.thecommonsforall.com",
    "podcast-language": "en-us",
    "podcast-copyright": "",
    "podcast-category": "Religion & Spirituality",
    "series": [
        {
            "type": "sermon-series",
            "id": "101adult-content",
            "title": "Adult Content",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "1the-meaning-of-marriage",
                    "title": "The Meaning of Marriage",
                    "time": 1410111000,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/1the-meaning-of-marriage\/the-meaning-of-marriage.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading 1 Corinthians 7:27-40."
                },
                {
                    "type": "sermon",
                    "id": "2mr-and-mrs-right",
                    "title": "Mr. & Mrs. Right",
                    "time": 1410715800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/2mr-and-mrs-right\/mr-and-mrs-right.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Ephesians 5:25-32."
                },
                {
                    "type": "sermon",
                    "id": "3darren-oeis-story",
                    "title": "Darren Oei\'s Story",
                    "time": 1411320600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/3darren-oeis-story\/darren-oeis-story.mp3",
                    "desc": "Special guest Darren Oei shares his testimony. Scripture Reading 2 Corinthians 5:13-6:2."
                },
                {
                    "type": "sermon",
                    "id": "4darren-oei-qa",
                    "title": "Darren Oei - Q&A Session",
                    "time": 1411323300,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/4darren-oei-qa\/darren-oei-qa.mp3",
                    "desc": "Q&A session with Jon Nichols and Darren Oei"
                },
                {
                    "type": "sermon",
                    "id": "5pullingweeds",
                    "title": "Pulling Weeds And Planting Seeds",
                    "time": 1411925400,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/5pullingweeds\/5Pullingweeds.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Galatians 5:13-26."
                },
                {
                    "type": "sermon",
                    "id": "6relationshipcycle",
                    "title": "The Cycle Of Relationships",
                    "time": 1412530200,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/101adult-content\/6relationshipcycle\/6Relationships.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Galatians 6:1-10."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "102evol",
            "title": "Evol",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/102evol\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "1evil_is_not_a_donut_hole",
                    "title": "Evil Is Not A Donut Hole",
                    "time": 1413135000,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/102evol\/1evil_is_not_a_donut_hole\/6Evil_DonutHole.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Ephesians 6:10-18."
                },
                {
                    "type": "sermon",
                    "id": "2Two_Kingdoms",
                    "title": "The Story Of Two Kingdoms",
                    "time": 1413739800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/102evol\/2Two_Kingdoms\/7Two_Kingdoms.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Luke 11:14-26."
                },
                {
                    "type": "sermon",
                    "id": "3GodLikeJesus",
                    "title": "A God Like Jesus",
                    "time": 1414344600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/102evol\/3GodLikeJesus\/8AGodLikeJesus.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Hebrews 1:1-4."
                },
                {
                    "type": "sermon",
                    "id": "4VictoryofJesus",
                    "title": "The Victory of Jesus",
                    "time": 1414953000,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/102evol\/4VictoryofJesus\/9VictoryofJesus.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Mark 15:22-37."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "103sacredroots",
            "title": "Sacred Roots",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/103sacredroots\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "1compassion",
                    "title": "Compassion",
                    "time": 1415557800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/103sacredroots\/1compassion\/10compassion.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Exodus 34:5-7."
                },
                {
                    "type": "sermon",
                    "id": "2steadfastlove",
                    "title": "Steadfast Love",
                    "time": 1416162600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/103sacredroots\/2steadfastlove\/11faithfulness.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Exodus 34:5-7."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "104adventure",
            "title": "Advent(ure)",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/104adventure\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "3mission",
                    "title": "Mission",
                    "time": 1417977000,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/104adventure\/3mission\/advent_3mission.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Matthew 9:35-10:1."
                },
                {
                    "type": "sermon",
                    "id": "4kingdompt1",
                    "title": "How the Kingdom is established Pt1",
                    "time": 1418581800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/104adventure\/4kingdompt1\/advent_4kingdompt1.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Matthew 13:1-9."
                },
                {
                    "type": "sermon",
                    "id": "5kingdompt2",
                    "title": "How the Kingdom is established Pt2",
                    "time": 1419186600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/104adventure\/5kingdompt2\/advent_5kingdompt2.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Matthew 13:24-33."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "201commonprayer",
            "title": "Common Prayer",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/201commonprayer\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "1teachustopray",
                    "title": "Lord, teach us to pray",
                    "time": 1420396200,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/201commonprayer\/1teachustopray\/1prayer_teachus.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Luke 11:1-4."
                },
                {
                    "type": "sermon",
                    "id": "2bestill",
                    "title": "Be still and know I am God",
                    "time": 1421001000,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/201commonprayer\/2bestill\/2prayer_bestill.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Psalm 1."
                },
                {
                    "type": "sermon",
                    "id": "3theyneedhelp",
                    "title": "Father, they need help",
                    "time": 1421605800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/201commonprayer\/3theyneedhelp\/3prayer_theyneedhelp.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Matthew 17:14-20."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "202vision",
            "title": "Vision 2015",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/202vision\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "vision2015",
                    "title": "Vision 2015",
                    "time": 1422210600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/202vision\/vision2015\/vision2015.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Matthew 16:13-28."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "203worshipcollective",
            "title": "Worship Collective",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/203worshipcollective\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "CorshipCollectiveFeb",
                    "title": "Worship Collective",
                    "time": 1422815400,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/203worshipcollective\/CorshipCollectiveFeb\/worshipcollectivefeb.mp3",
                    "desc": "Sermon by Robin Nichols. Scripture Reading Hebrews 10:23-25."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "204lifefreelygivefreely",
            "title": "Live Freely Give Freely",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/204lifefreelygivefreely\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "livefreelygivefreely",
                    "title": "Live Freely Give Freely",
                    "time": 1424025000,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/204lifefreelygivefreely\/livefreelygivefreely\/givefreely.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading 2 Corinthians 9:5-11. *Part 1 of this series failed to record."
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "205Guest",
            "title": "Darren Oei Guest Speaker",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/205Guest\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "DarrenOei",
                    "title": "Darren Oei Guest Speaker",
                    "time": 1424629800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/205Guest\/DarrenOei\/DarrenOeiGuest.mp3",
                    "desc": "Sermon by Darren Oei. Scripture Reading Acts 8:26-40"
                }
            ]
        },
        {
            "type": "sermon-series",
            "id": "206youaskedforit",
            "title": "You Asked For It",
            "cover": "http:\/\/thecommonsforall.com\/sermons\/media\/206youaskedforit\/",
            "video": "",
            "sermons": [
                {
                    "type": "sermon",
                    "id": "1Intolerance",
                    "title": "Is Christianity Intolerant?",
                    "time": 1425234600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/206youaskedforit\/1Intolerance\/1intolerant.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Acts 19:23-41"
                },
                {
                    "type": "sermon",
                    "id": "2dontfeelgod",
                    "title": "What Do I Do When I Don\u2019t Feel God?",
                    "time": 1425835800,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/206youaskedforit\/2dontfeelgod\/dontfeelgod.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading Romans 8:13-17"
                },
                {
                    "type": "sermon",
                    "id": "3bibleliterally",
                    "title": "Do I Have To Take The Bible Literally?",
                    "time": 1426440600,
                    "audio": "http:\/\/thecommonsforall.com\/sermons\/media\/206youaskedforit\/3bibleliterally\/do-i-have-to-take-the-bible-literally.mp3",
                    "desc": "Sermon by Jon Nichols. Scripture Reading 2 Peter 1:16-21"
                }
            ]
        }
    ]
}');
            $response->setData($hax);
            return $response;
        }
    }
}
