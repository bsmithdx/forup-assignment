import React from 'react'

const CharacterTableRow = ({ character }) => {

    return (
        <tr>
            <td className={"border-dotted border-2 border-black"}>{character.name}</td>
            <td className={"border-dotted border-2 border-black"}>{character.alias}</td>
            <td className={"border-dotted border-2 border-black"}>{character.gender}</td>
            <td className={"border-dotted border-2 border-black"}>{character.culture}</td>
        </tr>
    )
}

export default CharacterTableRow
