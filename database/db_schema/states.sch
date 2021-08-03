Model : Models\State
Collection : states


fields 

{
    name       : "required"  unique against the country_id
    country_id : "required"
    state_code : "required"
    created_at : ""
    update_at  : ""
    deleted_at : ""
}   