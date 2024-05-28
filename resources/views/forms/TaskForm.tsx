// import React from "react";
import *  as React from "react";
import apiService from "../../js/components/services/apiService";
import { useTaskContext } from "../../js/components/context/TaskContext";

export const TaskForm = () => {
    const [title, setTitle] = React.useState("");
    const [description, setDescription] = React.useState("");
    const {updateContextData} = useTaskContext();

    // check if the form if working
    // React.useEffect(() => {
    //     console.log('Title:', title, 'Description:', description);
    // }, [
    //     title,
    //     description
    // ]);

    const handleSubmit = () => {
        apiService.post('save-task', {
            title,
            description
        }).then(()=> {
            // console.log(res);
            setTitle("");
            setDescription("");
            updateContextData();
        })
    }

    return ( 
    <div className="flex flex-col gap-3">
        <input 
            value={title}
            onChange={(event) => (
                setTitle(event.target.value)
            )}
            type="text" 
            placeholder="Title"
            className="input input-bordered w-full "
        />
        <textarea 
            value={description}
            onChange={(event) => (
                setDescription(event.target.value)
            )}
            className="textarea textarea-bordered min-h-52"
            placeholder="Description"
        ></textarea>
        <button className="btn btn-secondary" onClick={handleSubmit}>Save Task</button>

    </div>
    );
};

export default TaskForm;