# GeoSnake-API
 [Eduskunta_API](https://github.com/tuoku/eduskunta_API) modified to keep track of player highscores

## Examples
#### Get highscores by nickname DESC 
`GET users.metropolia.fi/~tuomakuh/geosnake/?action=top`  
returns:  
```
[
    {
        "nickname": "tuomas",
        "highscore": "69420"
    },
    {
        "nickname": "moi",
        "highscore": "2000"
    },
    {
        "nickname": "joku",
        "highscore": "269"
    }
]
```
#### Set a new highscore for nickname   
`GET https://users.metropolia.fi/~tuomakuh/geosnake/?action=set&nickname=joku&highscore=259`  
returns:  
`{"message":"true"}`  

