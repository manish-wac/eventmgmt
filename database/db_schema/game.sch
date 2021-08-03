Model : Models\Game
Collection : games


fields 

{
    name : "required" | unique 
    game_code : "required" | unique,
    game_id : "required" | unique
    questions : object array ['question_id' => "", 'published_at' => date_type]
    question_id : "required" as array
    created_by : 
    updated_by : 
    created_at : "",
    update_at : "",
    deleted_at : ""
}   