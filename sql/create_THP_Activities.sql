/*
table 3: thp_activities

** tracks activity from every engagement by everyone.
** types of activities
    action_types
    [
      public (for everyone):   submit_new_app, login, logout, 
                activate_account, session_length 
                (track session length at logout)

      user:     address_change, phone_num_change, preference_change
      viewer:   view_accounts, view_applications, view_documents
      reviewer: manage_accounts, activate_user, deactivate_user,
                update_status
      admin:    ...
      auditor:  login, logout, view_activities, view_changes
    ]

** columns:
    id (auto increment)
    action_date (current_timestamp)
    username (email address if applicable)
    action_type: keyword from actions table
    action_detail: user account seb@example.com changed their address from [old add lane] to [new address] on 2024-03-10 at 14:33:00.

*/